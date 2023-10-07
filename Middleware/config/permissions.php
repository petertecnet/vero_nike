<?php

return [

	'company_create' => ['name'=>'Criar uma nova empresa', 'description'=>'Esta permissão fará com que esteja disponível a opção "Criar uma nova empresa" no menu de seleção de empresas. Através desta permissão o usuário poderá fazer com que exista uma nova empresa a ser gerenciada pela aplicação.'],

    'company_edit' => ['name'=>'Editar uma empresa', 'description'=>'Esta permissão fará com que esteja disponível a opção "Editar uma  empresa" no menu de seleção de empresas. Através desta permissão o usuário poderá fazer edições de uma empresa pela aplicação.'],

	'company_config' => ['name'=>'Configurar uma nova empresa', 'description'=>'Esta permissão é diferente de criação de empresa, porém trabalha em conjunto com ela. Cada módulo e submódulo possui uma configuração técnica para funcionar e realizar essa configuração muitas vezes exige conhecimento técnico por parte do usuário.'],

	'user_create' => ['name'=>'Criar um novo usuario', 'description'=>'Esta permissão fará com que esteja disponível a opção "Criar um novo usuario" no menu de seleção de usuarios. Através desta permissão o usuário poderá fazer com que exista um novo usuario a ser gerenciado pela aplicação.'],

	'user_config' => ['name'=>'Configurar um novo usuario', 'description'=>'Esta permissão é diferente de criação de usuario, porém trabalha em conjunto com ela. Cada módulo e submódulo possui uma configuração técnica para funcionar e realizar essa configuração muitas vezes exige conhecimento técnico por parte do usuário.'],

	'profile_create' => ['name'=>'Criar um novo perfil', 'description'=>'Esta permissão fará com que esteja disponível a opção "Criar um novo perfil" no menu de seleção de usuarios. Através desta permissão o usuário poderá fazer com que exista um novo perfil a ser gerenciado pela aplicação.'],

	'profile_config' => ['name'=>'Configurar um novo perfil', 'description'=>'Esta permissão é diferente de criação de perfiç, porém trabalha em conjunto com ela. Cada módulo e submódulo possui uma configuração técnica para funcionar e realizar essa configuração muitas vezes exige conhecimento técnico por parte do usuário.'],

	'data_import' => ['name'=>'Importar Dados', 'description'=>'Esta permissão dá ao usuário o poder de solicitar a importação de dados da empresa. Essa importação de dados deverá ser executada segundo as configurações especificadas (automática se for acesso direto ao banco de dados por exemplo e a necessidade de importar um arquivo caso seja através de um arquivo do excel).'],

	'data_export' => ['name'=>'Exportar Dados', 'description'=>'Esta permissão permite gerar os arquivos do SAP B1 através de tudo o que foi importado para dentro do Middleware Nike. Os dados exportados são "marcados" como "já enviados ao SAP" e não serão gerados nas novas exportações.Caso seja necessário reenviar os dados que foram marcados como enviados o fluxo será o mesmo de expurgo de dados importados.'],

	'data_edit' => ['name'=>'Editar Dados', 'description'=>'Os dados já importados dentro do Middleware Nike estarão disponíveis para edição a fim de realizar pequenos (ou até maiores) ajustes após a importação. Apenas usuários com essa permissão terão acesso à essa edição.'],

	'data_purge' => ['name'=>'Expurgar Dados', 'description'=>'Esta permissão dá ao usuário o poder de expurgar uma importação existente. Caso haja algum erro nos dados. Caso uma importação tenha sido expurgada os dados deverão ser importados novamente.'],

];
