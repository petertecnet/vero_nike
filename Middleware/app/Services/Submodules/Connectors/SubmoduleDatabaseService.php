<?php

namespace App\Services\Submodules\Connectors;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Exception;
use StdClass;
use PDO;
use App\Exceptions\CannotExecuteConfiguration;
use App\Models\Company;
use App\Services\SubmoduleConnector;

class SubmoduleDatabaseService extends SubmoduleConnector
{
	public $key					= 'database';
	public $name				= 'Banco de Dados';
	public $description			= null;
	public $views				= [
		'configuration'				=> 'submodules.database_config',
		'process'					=> 'submodules.database_import',
	];
	public $layout_ConfigIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-database'];

	private $databases		= [
		// ['value'=>'oracle', 'label'=>'Oracle', 'selected'],
		['value'=>'mssql', 'label'=>'MS SQL'],
		['value'=>'pgsql', 'label'=>'Postgres SQL'],
		['value'=>'mysql', 'label'=>'MySQL'],
	];

	public function GetDatabasesAsLabelValue ()
	{
		$databases = [];

		foreach ($this->databases as $database)
			$databases[] = (object) $database;

		return $databases;
	}

	public function Execute (Request $request, Company $company, $config)
	{
		try
		{
			$pdo = new PDO($this->GetPDOConnectionString($config), $config->user, $config->password, array(
				PDO::ATTR_TIMEOUT => 600, // in seconds
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			));
			$query = $this->GetQueryFromConfig($config);
			$statement = $pdo->prepare($query);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			
			Log::debug($query);

			if (!$statement->execute())
			{
				Log::error('Error on execute query');
				Log::error($query);
				throw new CannotExecuteConfiguration('Query inválida. Verifique as configurações e tente novamente');
			}
			
			return $statement->fetchAll();
		}
		catch (CannotExecuteConfiguration $exception)
		{
			Log::error($exception->GetMessage());

			throw $exception;
		}
		catch (Exception $exception)
		{
			Log::error($exception->GetMessage());

			throw new CannotExecuteConfiguration('Não foi possível conectar ao banco de dados especificado, verifique as configurações e tente novamente. Caso não tenha sucesso entre em contato com um administrador');
		}
	}

	public function GetConfigFromRequestPost (Request $request) : StdClass
	{
		$config = new stdClass();

		$config->submodule = $this->key;
		$config->select = $request->input('select');
		$config->from = $request->input('from');
		$config->join = $request->input('join');
		$config->where = $request->input('where');
		$config->append = $request->input('append');
		$config->column = $request->input('column');
		$config->type = $request->input('type');
		$config->database = $request->input('database');
		$config->host = $request->input('host');
		$config->user = $request->input('user');
		$config->password = $request->input('password');

		return $config;
	}

	private function GetQueryFromConfig ($config) : string
	{
		try
		{
			$select = [];
			$where = [];
			$from = $config->from;
			$join = $config->join;
			$append = $config->append;

			$column = $config->select->{$config->column};

			foreach ($config->select as $key => $value)
				$select[] = "{$value} AS \"{$key}\"";

			$where[] = "{$column} NOT IN (null)";
			$where[] = $config->where;

			$select = implode(',' . PHP_EOL, $select);
			$where = implode(PHP_EOL, $where);

			return "
				SELECT
					{$select}
				FROM
					{$from}
						{$join}
				
				{$append}
			";
		}
		catch (Exception $exception)
		{
			Log::error($exception->GetMessage());

			throw new CannotExecuteConfiguration('Não foi possível montar a query básica com as configurações estipuladas, verifique se as configurações estão corretas e tente novamente. Caso não tenha sucesso entre em contato com um administrador');
		}
	}

	private function GetPDOConnectionString ($config)
	{
		switch ($config->type)
		{
			case 'mssql':

				return "sqlsrv:Server={$config->host};Database={$config->database}";

			case 'mysql':

				return "mysql:host={$config->host};dbname={$config->database}";

			case 'pgsql':

				return "pgsql:host={$config->host};port=5432;dbname={$config->database}";

			case 'oracle':

				break;
			
		}
		
		Log::error('Erro na montagem da connection string');
		Log::error(json_encode($config));

		throw new CannotExecuteConfiguration('Configuração inválida, verifique as configurações e tente novamente. Caso não tenha sucesso entre em contato com um administrador');
	}
}