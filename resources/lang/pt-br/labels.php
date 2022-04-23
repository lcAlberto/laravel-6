<?php
/**
 * Cabeçalhos de tabelas e descrição de campos de formulário ficam neste arquivo.
 * Descrições com nome genérico devem começar com underline.
 */

use App\Enums\Animals\AnimalSituationStatus;

return [
    'Logout' => 'Sair',

    'created_at' => 'criado em',
    'Search' => 'Pesquisar',

    'books' => [
        'Code ISBN' => 'Código ISBN',
        'Title' => 'Título',
        'Author' => 'Autor',
        'Giver' => 'Doador',
        'Entry Date' => 'Data de Entrada',
    ],

    'loans' => [
        'borrowed' => 'emprestado',
        'available' => 'disponível'
    ],


    /*REFORMULACAO DO DASHBOARD*/

    'Wellcome' => 'Bem Vindo',
    'Painel' => 'Painel',
    'Users' => 'Usuários',
    'User' => 'Usuário',
    'User Management' => 'Gerenciamento de Usuarios',
    'Search users' => 'Pesquisar Usuario',
    'Password' => 'Senha',
    'Confirm Password' => 'Confirmar Senha',
    'Create Accont' => 'Registrar-se',
    'Remember me' => 'Lembrar-me',
    'Forgot Password' => 'Esqueceu a senha',
    'Or sign up with credentials' => 'Se inscreva com essas credenciais',
    'I agree with the' => 'Concordo com os',
    'Privacy Policy' => 'Termos de Uso',
    'A fresh verification link has been sent to your email address' => 'Uma nova verificaçao foi enviada ao email cadastrado',
    'Verify Your Email Address' => 'Verifique seu email',
    'fields with' => 'Os campos com',
    'are required' => 'sao obrigatorios',


    //Navigation, buttons, links
    'Back' => 'Voltar',
    'Home' => 'Inicio',
    'Add User' => 'Novo Usuario',
    'title' => 'Tíulo',
    'Edit' => 'Editar',
    'Delete' => 'Deletar',
    'Details' => 'Detalhes',
    'Save' => 'Salvar',
    'search' => 'pesquisar',
    'Total flock' => 'Rebanho Total',
    'Events' => 'Eventos',
    'cios' => 'cios',
    'Cio' => 'Cio',
    'reproductive-cycle', 'ciclo reprodutivo',
    'Reproductive-Cycle', 'Ciclo Reprodutivo',
    'Create' => 'Criar',

    //Attributes
    'ID' => 'ID',
    'Name' => 'Nome',
    'Email' => 'e-mail',
    'email' => 'email',
    'Creation Date' => 'Data de Criaçao',
    'Birth' => 'Nascimento',
    'Gender' => 'Sexo',
    'Classification' => 'Classificaçao',
    'Mother' => 'Mae',
    'Father' => 'Pai',
    'Operations Avaliable' => 'Operaçoes Disponiveis',
    'Current Password' => 'Senha Atual',
    'Confirm New Password' => 'Confirmar nova Senha',
    'Change password' => 'Alterar Senha',
    'Activity' => 'Atividade',
    'Settings' => 'Configuraçoes',
    '_flock' => 'Rebanho',
    'Cow' => 'Vaca',
    'Cows' => 'Vacas',
    'Total' => 'Total',
    'Infants' => 'Novilhas',
    'Dry' => 'Secas',
    'Heifers' => 'Lactantes',
    'Bulls' => 'Touros',

    'Street' => 'Rua',
    'Postal Code' => 'CEP',
    'District' => 'Bairro',
    'Number' => 'Numero',
    'Complement' => 'Complemento',
    'City' => 'Cidade',
    'State' => 'Estado /UF',
    'Description' => 'Descrição',
    'Price' => 'Preço',
    'New' => 'Novo',
    'New(a)' => 'Nova',
    'new' => 'novo',
    'new(a)' => 'nova',
    'Confirm' => 'Confirmar',
    'Choose Image' => 'Enconte a Imagem',
    'Product title' => 'Titulo do Produto',
    'description' => 'Descrição',
    'Image upload' => 'Upload da Imagem',
    'Choose thumbnail' => 'Escolha a miniatura',
    'My' => 'Meu',
    'my' => 'meu',
    'Suport' => 'Suporte',
    'Support' => 'Suporte',

    //Session
    'Hello' => 'Ola',
    'LogOut' => 'Sair',
    'Login' => 'Entrar',
    'Register' => 'Registrar-se',
    'profile' => 'Perfil',

    //users
    'Create new user' => 'Criar novo usuário',
    'Edit this user' => 'Edite este usuário',

    'animal' => [
        'Create new Animal' => 'Cadastrar um novo animal',
        'Edit this animal' => 'Editar animal',
        'Details of this animal' => 'Detalhes do Animal',

        'situation' => [
            AnimalSituationStatus::ALIVE => 'Vivo',
            AnimalSituationStatus::DEAD => 'Morto',
            AnimalSituationStatus::SOLD => 'Vendido',
            AnimalSituationStatus::SLAUGHTERED => 'Abatido',
        ],

        'age_classification' => [
            \App\Enums\Animals\AnimalAgeClassificationEnum::ADULT_COW => 'Fêmea adulta',
            \App\Enums\Animals\AnimalAgeClassificationEnum::HEIFER => 'Novilha',
            \App\Enums\Animals\AnimalAgeClassificationEnum::BABY_COW => 'Bezerra',
            \App\Enums\Animals\AnimalAgeClassificationEnum::BABY_BULL => 'Bezerro',
            \App\Enums\Animals\AnimalAgeClassificationEnum::REPRODUCTIVE_BULL => 'Touro',
        ],
        'production_classification' => [
            \App\Enums\Animals\AnimalProductionStatus::LACTATING => 'Lactante',
            \App\Enums\Animals\AnimalProductionStatus::BULL_CASTRATED => 'Touro castrado',
            \App\Enums\Animals\AnimalProductionStatus::BULL_REPRODUCTIVE => 'Touro',
            \App\Enums\Animals\AnimalProductionStatus::DRY => 'Seca',
            \App\Enums\Animals\AnimalProductionStatus::NO_LACTATING => 'Não lactante',
            \App\Enums\Animals\AnimalProductionStatus::PREGNANT => 'Prenha',
            \App\Enums\Animals\AnimalProductionStatus::BULL_RUFFIAN => 'Touro rufião',
        ],
    ],


    //cios
    'Reproductive cycle management' => 'Gerenciamento do ciclo reprodutivo',
    'Reproductive cycle per animal' => 'Ciclo reprodutivo por animal',

    'Edit this reproductive cycle' =>'Editar este ciclo reprodutivo',
    'Register a new reproductive cycle' =>'Cadastrar novo ciclo reprodutivo',

    //health
    'Treatment by specific animal' => 'Tratamento por animal específico',
    'Treatment of all animals' => 'Tratamento de todos os animais',
    'New treatment record' => 'Novo registro de tratamento',
    'Edit treatment record' => 'Editar registro de tratamento',
    'Treatment details' => 'Detalhes do tratamento',

    //medicaments
    'Medicaments' => 'Medicamentos',
    'Medicaments details' => 'Detalhe do medicamento',
    'Here you can keep your entire veterinary pharmacy' => 'Aqui você pode manter toda a sua farmácia veterinária',

    //Enuns
    'cow-lactating' => 'Vaca Lactante',
    'cow-non-lactating' => 'Vaca Não-Lactante',
    'cow-dry' => 'Vaca Seca',
    'heifer' => 'Novilha',
    'she-calves' => 'Bezerra',
    'he-calves' => 'Bezerro',
    'bull-reproductive' => 'Touro',
    'bull-castrated' => 'Capão',
    'bull-ruffian' => 'Rufião',
    'unknow' => 'Desconhecido(a)',
    'mother' => 'mãe',

    'alive' => 'vivo',
    'dead' => 'morto',
    'sold' => 'vendido',

    'male' => 'macho',
    'femeale' => 'femeale',

    'success' => 'sucesso',
    'abortion' => 'aborto',
    'pending' => 'pendente',
    'cleaning' => 'limpeza',

    'insemination' => 'inseminação',
    'natural' => 'natural',

];
