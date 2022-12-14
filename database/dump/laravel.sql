-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Out-2022 às 12:02
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laravel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(2, NULL, 1, 'Category 2', 'category-2', '2022-08-19 02:06:42', '2022-08-19 02:06:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome`, `sigla`, `estado_id`, `created_at`, `updated_at`) VALUES
(1, 'Jardim', 'JD', 1, '2022-10-10 17:41:33', '2022-10-10 17:41:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'voyager::seeders.data_rows.roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 7, 'titulo', 'text', 'Titulo', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|min:5\",\"messages\":{\"required\":\"O :attribute \\u00e9 obrigat\\u00f3rio.\",\"min\":\"O :attribute deve possuir :min caracteres.\"}}}', 3),
(58, 7, 'descricao', 'rich_text_box', 'Descricao', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"nullable|min:10|max:200\",\"messages\":{\"nullable\":\"A :attribute n\\u00e3o \\u00e9 obrigat\\u00f3ria, mas como informou, termine.\",\"min\":\"A :attribute deve ter no m\\u00ednimo :min caracteres.\",\"max\":\"A :attribute deve ter no :max caracteres.\"}}}', 4),
(59, 7, 'valor', 'number', 'Valor', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|numeric\",\"messages\":{\"required\":\"Informe o :attribute deste evento.\",\"numeric\":\"O :attribute s\\u00f3 pode ser num\\u00e9rico.\"}}}', 5),
(60, 7, 'dia_realizado', 'date', 'Dia Realizado', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|date\",\"messages\":{\"required\":\"Informe o :attribute deste evento.\",\"date\":\"A data do :attribute n\\u00e3o pode ultrapassar o dia de hoje.\"}}}', 6),
(62, 7, 'user_id', 'number', 'User Id', 0, 0, 0, 0, 0, 0, '{}', 8),
(63, 7, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 9),
(64, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(65, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(66, 8, 'baixa_resolucao', 'image', 'Baixa Resolucao', 0, 0, 0, 0, 0, 0, '{}', 2),
(67, 8, 'original', 'image', 'Original', 1, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":null},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 3),
(68, 8, 'evento_id', 'number', 'Evento Id', 1, 0, 0, 0, 0, 0, '{}', 4),
(69, 8, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(70, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(71, 7, 'evento_belongsto_user_relationship', 'relationship', 'users', 0, 0, 1, 0, 0, 0, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(72, 8, 'foto_belongsto_evento_relationship', 'relationship', 'eventos', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Evento\",\"table\":\"eventos\",\"type\":\"belongsTo\",\"column\":\"evento_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(74, 7, 'evento_belongsto_foto_relationship', 'relationship', 'fotos', 0, 0, 1, 0, 0, 1, '{\"model\":\"App\\\\Models\\\\Foto\",\"table\":\"fotos\",\"type\":\"hasMany\",\"column\":\"evento_id\",\"key\":\"id\",\"label\":\"original\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 12),
(76, 7, 'capa_id', 'text', 'Capa Id', 0, 0, 0, 0, 0, 0, '{}', 2),
(77, 7, 'evento_belongsto_foto_relationship_1', 'relationship', 'capa', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Foto\",\"table\":\"fotos\",\"type\":\"belongsTo\",\"column\":\"capa_id\",\"key\":\"id\",\"label\":\"original\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13),
(78, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(79, 11, 'whatsapp', 'number', 'Whatsapp', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"integer\",\"messages\":{\"integer\":\"O :attribute deve conter apenas n\\u00fameros.\"}}}', 2),
(80, 11, 'facebook', 'text', 'Facebook', 0, 1, 1, 1, 1, 1, '{}', 3),
(81, 11, 'instagram', 'text', 'Instagram', 0, 1, 1, 1, 1, 1, '{}', 4),
(82, 11, 'biografia', 'text', 'Biografia', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|min:20\",\"messages\":{\"required\":\"A :attribute \\u00e9 obrigat\\u00f3ria informar.\",\"min\":\"A :attribute deve ter :min caracteres.\"}}}', 5),
(83, 11, 'site', 'text', 'Site', 0, 1, 1, 1, 1, 1, '{}', 6),
(84, 11, 'emial_profissional', 'text', 'Email Profissional', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"unique\",\"messages\":{\"unique\":\"O :attribute deve ser \\u00fanico.\"}}}', 7),
(85, 11, 'nome_artistico', 'text', 'Nome Artistico', 0, 1, 1, 1, 1, 1, '{}', 8),
(86, 11, 'status', 'select_dropdown', 'Status', 0, 1, 1, 0, 0, 0, '{\"default\":\"1\",\"options\":{\"1\":\"Cadatrado\",\"2\":\"Ativo\",\"3\":\"Inativo\"}}', 9),
(87, 11, 'cidade_id', 'text', 'Cidade Id', 0, 0, 0, 0, 0, 0, '{}', 10),
(88, 11, 'user_id', 'text', 'User Id', 0, 0, 0, 0, 0, 0, '{}', 11),
(89, 11, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 12),
(90, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(91, 7, 'status', 'checkbox', 'Status', 1, 1, 1, 1, 0, 0, '{\"on\":\"P\\u00fablico\",\"off\":\"Privado\",\"checked\":true}', 7),
(92, 11, 'fotografo_belongsto_user_relationship', 'relationship', 'user', 0, 1, 1, 1, 0, 0, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 14),
(93, 12, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(94, 12, 'nome', 'text', 'Nome', 1, 1, 1, 1, 1, 1, '{}', 2),
(95, 12, 'sigla', 'text', 'Sigla', 1, 1, 1, 1, 1, 0, '{}', 3),
(96, 12, 'estado_id', 'text', 'Estado Id', 0, 0, 0, 0, 0, 0, '{}', 4),
(97, 12, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(98, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(99, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(100, 13, 'nome', 'text', 'Nome', 1, 1, 1, 1, 1, 1, '{}', 2),
(101, 13, 'sigla', 'select_dropdown', 'Sigla', 1, 1, 1, 1, 1, 0, '{\"default\":\"ms\",\"options\":{\"ms\":\"MS\",\"mt\":\"MT\",\"ac\":\"AC\",\"al\":\"AL\",\"ap\":\"AP\",\"am\":\"AM\",\"ba\":\"BA\",\"ce\":\"CE\",\"df\":\"DF\",\"go\":\"GO\",\"mg\":\"MG\",\"pa\":\"PA\",\"pb\":\"PB\",\"pr\":\"PR\",\"pe\":\"PE\",\"pi\":\"PI\",\"rj\":\"RJ\",\"rn\":\"RN\",\"rs\":\"RS\",\"ro\":\"RO\",\"rr\":\"RR\",\"sc\":\"SC\",\"sp\":\"SP\",\"se\":\"SE\",\"to\":\"TO\"}}', 3),
(102, 13, 'pais_id', 'text', 'Pais Id', 0, 0, 0, 0, 0, 0, '{}', 4),
(103, 13, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(104, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(105, 11, 'fotografo_belongsto_cidade_relationship', 'relationship', 'cidade', 0, 1, 1, 1, 0, 0, '{\"model\":\"App\\\\Models\\\\Cidade\",\"table\":\"cidades\",\"type\":\"belongsTo\",\"column\":\"cidade_id\",\"key\":\"id\",\"label\":\"nome\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 15),
(106, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(107, 15, 'nome', 'text', 'Nome', 1, 1, 1, 1, 1, 1, '{}', 2),
(108, 15, 'sigla', 'text', 'Sigla', 1, 1, 1, 1, 1, 0, '{}', 3),
(109, 15, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(110, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(111, 13, 'estado_belongsto_pai_relationship', 'relationship', 'pais', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Pais\",\"table\":\"pais\",\"type\":\"belongsTo\",\"column\":\"pais_id\",\"key\":\"id\",\"label\":\"nome\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(112, 12, 'cidade_belongsto_estado_relationship', 'relationship', 'estados', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Estado\",\"table\":\"estados\",\"type\":\"belongsTo\",\"column\":\"estado_id\",\"key\":\"id\",\"label\":\"nome\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(119, 17, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(120, 17, 'user_id', 'text', 'User Id', 0, 0, 0, 0, 0, 0, '{}', 2),
(121, 17, 'status', 'select_dropdown', 'Status', 0, 1, 1, 0, 0, 0, '{\"default\":\"1\",\"options\":{\"1\":\"Cadatrado\",\"2\":\"Aguardando pagamento\",\"3\":\"Pago\"}}', 3),
(122, 17, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(123, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(124, 17, 'valor_total', 'text', 'Valor Total', 0, 1, 1, 0, 0, 0, '{}', 6),
(125, 17, 'pedido_belongstomany_foto_relationship', 'relationship', 'fotos', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Foto\",\"table\":\"fotos\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"original\",\"pivot_table\":\"itens_pedidos\",\"pivot\":\"1\",\"taggable\":\"on\"}', 7),
(126, 7, 'evento_belongsto_cidade_relationship', 'relationship', 'cidade', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Cidade\",\"table\":\"cidades\",\"type\":\"belongsTo\",\"column\":\"cidade_id\",\"key\":\"id\",\"label\":\"nome\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 14),
(127, 7, 'cidade_id', 'text', 'Cidade Id', 0, 1, 1, 1, 1, 1, '{}', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(7, 'eventos', 'eventos', 'Evento', 'Eventos', 'voyager-calendar', 'App\\Models\\Evento', NULL, 'App\\Http\\Controllers\\VoyagerController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":\"active\"}', '2022-08-19 02:12:48', '2022-10-15 21:06:42'),
(8, 'fotos', 'fotos', 'Foto', 'Fotos', 'voyager-photos', 'App\\Models\\Foto', NULL, 'App\\Http\\Controllers\\VoyagerController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-08-19 02:15:05', '2022-10-12 02:31:17'),
(11, 'fotografos', 'fotografos', 'Fotografo', 'Fotografos', 'voyager-people', 'App\\Models\\Fotografo', NULL, 'App\\Http\\Controllers\\VoyagerController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":\"active\"}', '2022-10-08 03:08:02', '2022-10-16 23:34:07'),
(12, 'cidades', 'cidades', 'Cidade', 'Cidades', 'voyager-compass', 'App\\Models\\Cidade', NULL, 'App\\Http\\Controllers\\VoyagerController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-10-10 13:35:07', '2022-10-11 13:20:20'),
(13, 'estados', 'estados', 'Estado', 'Estados', 'voyager-pirate', 'App\\Models\\Estado', NULL, 'App\\Http\\Controllers\\VoyagerController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-10-10 13:45:15', '2022-10-10 17:20:23'),
(15, 'pais', 'pais', 'Pai', 'Pais', 'voyager-world', 'App\\Models\\Pais', NULL, 'App\\Http\\Controllers\\VoyagerController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-10-10 13:52:09', '2022-10-10 13:52:09'),
(17, 'pedidos', 'pedidos', 'Pedido', 'Pedidos', 'voyager-buy', 'App\\Models\\Pedido', NULL, 'App\\Http\\Controllers\\VoyagerController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-10-15 01:37:45', '2022-10-15 01:40:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `nome`, `sigla`, `pais_id`, `created_at`, `updated_at`) VALUES
(1, 'Mato Grosso do sul', 'ms', 1, '2022-10-10 17:38:41', '2022-10-10 17:38:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` float NOT NULL,
  `dia_realizado` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `capa_id` int(10) UNSIGNED DEFAULT 1,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `descricao`, `valor`, `dia_realizado`, `user_id`, `created_at`, `updated_at`, `capa_id`, `status`, `cidade_id`) VALUES
(23, 'festa', NULL, 15, NULL, 1, '2022-10-07 01:08:20', '2022-10-08 01:17:06', 18, '', NULL),
(24, 'Teste de rota', NULL, 20, NULL, 1, '2022-10-07 20:14:43', '2022-10-07 20:14:43', 14, '', NULL),
(25, 'evento fotografo', NULL, 10, '2022-08-08', 3, '2022-10-07 21:16:42', '2022-10-15 19:44:06', 1, '1', NULL),
(26, 'foto teste', NULL, 10, NULL, 1, '2022-10-08 03:12:08', '2022-10-08 03:12:08', NULL, '', NULL),
(27, 'festa louca', '<p>asdfghjkl&ccedil;</p>', 12, '2222-11-11', 1, '2022-10-10 12:50:43', '2022-10-18 01:29:09', 14, '1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotografos`
--

CREATE TABLE `fotografos` (
  `id` int(10) UNSIGNED NOT NULL,
  `whatsapp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biografia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emial_profissional` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_artistico` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `cidade_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fotografos`
--

INSERT INTO `fotografos` (`id`, `whatsapp`, `facebook`, `instagram`, `biografia`, `site`, `emial_profissional`, `nome_artistico`, `status`, `cidade_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '67999999999', 'facebook do fotógrafo', 'Instagram do fotógrafo', 'isso mesmo, eu sou fotógrafo e tiro fotos', NULL, 'fotografo@fotografo.com', NULL, 2, 1, 3, '2022-10-10 17:44:00', '2022-10-17 03:30:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE `fotos` (
  `id` int(10) UNSIGNED NOT NULL,
  `baixa_resolucao` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `evento_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`id`, `baixa_resolucao`, `original`, `evento_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'fotos\\September2022\\blObCGbxQZDZ3531uX41.jpg', 12, '2022-08-31 14:24:00', '2022-09-18 03:12:01'),
(13, NULL, 'fotos\\September2022\\zGzzk0oO25qd7JkogoHc.jpg', 15, '2022-08-31 14:30:00', '2022-09-18 03:11:46'),
(14, NULL, 'fotos\\September2022\\GjDOZi2RqqUcwuhcXxe0.jpg', 27, '2022-08-31 22:48:00', '2022-10-18 01:27:27'),
(18, NULL, 'fotos\\September2022\\Icv0MAMidA0KVNZ4LRrl.webp', 21, '2022-09-02 17:44:00', '2022-09-18 03:11:12'),
(19, NULL, 'fotos\\October2022\\yP2uuJEiwwRteqMSXdN4.jpg', 23, '2022-10-07 01:09:11', '2022-10-07 01:09:11'),
(20, NULL, 'fotos\\October2022\\Zkqtzgex1KRB05Ga2m8u.jpg', 23, '2022-10-12 02:31:45', '2022-10-12 02:31:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedidos`
--

CREATE TABLE `itens_pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `foto_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-08-19 02:06:42', '2022-08-19 02:06:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2022-08-19 02:06:42', '2022-08-19 02:06:42', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2022-08-19 02:06:42', '2022-08-19 02:06:42', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2022-08-19 02:06:42', '2022-08-19 02:06:42', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2022-08-19 02:06:42', '2022-08-19 02:06:42', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2022-08-19 02:06:42', '2022-08-19 02:06:42', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2022-08-19 02:06:42', '2022-08-19 02:06:42', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2022-08-19 02:06:42', '2022-08-19 02:06:42', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2022-08-19 02:06:42', '2022-08-19 02:06:42', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2022-08-19 02:06:42', '2022-08-19 02:06:42', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2022-08-19 02:06:42', '2022-08-19 02:06:42', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2022-08-19 02:06:42', '2022-08-19 02:06:42', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2022-08-19 02:06:42', '2022-08-19 02:06:42', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2022-08-19 02:06:42', '2022-08-19 02:06:42', 'voyager.pages.index', NULL),
(14, 1, 'Eventos', '', '_self', 'voyager-calendar', NULL, NULL, 15, '2022-08-19 02:12:48', '2022-08-19 02:12:48', 'voyager.eventos.index', NULL),
(15, 1, 'Fotos', '', '_self', 'voyager-photos', NULL, NULL, 16, '2022-08-19 02:15:05', '2022-08-19 02:15:05', 'voyager.fotos.index', NULL),
(17, 1, 'Fotografos', '', '_self', NULL, NULL, NULL, 17, '2022-10-08 03:08:02', '2022-10-08 03:08:02', 'voyager.fotografos.index', NULL),
(18, 1, 'Cidades', '', '_self', 'voyager-compass', NULL, NULL, 18, '2022-10-10 13:35:07', '2022-10-10 13:35:07', 'voyager.cidades.index', NULL),
(19, 1, 'Estados', '', '_self', 'voyager-pirate', NULL, NULL, 19, '2022-10-10 13:45:15', '2022-10-10 13:45:15', 'voyager.estados.index', NULL),
(20, 1, 'Pais', '', '_self', 'voyager-world', NULL, NULL, 20, '2022-10-10 13:52:09', '2022-10-10 13:52:09', 'voyager.pais.index', NULL),
(22, 1, 'Pedidos', '', '_self', 'voyager-buy', NULL, NULL, 21, '2022-10-15 01:37:45', '2022-10-15 01:37:45', 'voyager.pedidos.index', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(17, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(18, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(19, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(20, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(21, '2017_08_05_000000_add_group_to_settings_table', 1),
(22, '2017_11_26_013050_add_user_role_relationship', 1),
(23, '2017_11_26_015000_create_user_roles_table', 1),
(24, '2018_03_11_000000_add_user_settings', 1),
(25, '2018_03_14_000000_add_details_to_data_types_table', 1),
(26, '2018_03_16_000000_make_settings_value_nullable', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(29, '2022_07_12_190351_create_preferences_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2022-08-19 02:06:42', '2022-08-19 02:06:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`id`, `nome`, `sigla`, `created_at`, `updated_at`) VALUES
(1, 'Brasil', 'Br', '2022-10-10 17:38:17', '2022-10-10 17:38:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `valor_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(2, 'browse_bread', NULL, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(3, 'browse_database', NULL, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(4, 'browse_media', NULL, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(5, 'browse_compass', NULL, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(6, 'browse_menus', 'menus', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(7, 'read_menus', 'menus', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(8, 'edit_menus', 'menus', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(9, 'add_menus', 'menus', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(10, 'delete_menus', 'menus', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(11, 'browse_roles', 'roles', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(12, 'read_roles', 'roles', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(13, 'edit_roles', 'roles', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(14, 'add_roles', 'roles', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(15, 'delete_roles', 'roles', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(16, 'browse_users', 'users', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(17, 'read_users', 'users', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(18, 'edit_users', 'users', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(19, 'add_users', 'users', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(20, 'delete_users', 'users', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(21, 'browse_settings', 'settings', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(22, 'read_settings', 'settings', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(23, 'edit_settings', 'settings', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(24, 'add_settings', 'settings', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(25, 'delete_settings', 'settings', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(26, 'browse_categories', 'categories', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(27, 'read_categories', 'categories', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(28, 'edit_categories', 'categories', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(29, 'add_categories', 'categories', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(30, 'delete_categories', 'categories', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(31, 'browse_posts', 'posts', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(32, 'read_posts', 'posts', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(33, 'edit_posts', 'posts', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(34, 'add_posts', 'posts', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(35, 'delete_posts', 'posts', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(36, 'browse_pages', 'pages', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(37, 'read_pages', 'pages', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(38, 'edit_pages', 'pages', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(39, 'add_pages', 'pages', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(40, 'delete_pages', 'pages', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(41, 'browse_eventos', 'eventos', '2022-08-19 02:12:48', '2022-08-19 02:12:48'),
(42, 'read_eventos', 'eventos', '2022-08-19 02:12:48', '2022-08-19 02:12:48'),
(43, 'edit_eventos', 'eventos', '2022-08-19 02:12:48', '2022-08-19 02:12:48'),
(44, 'add_eventos', 'eventos', '2022-08-19 02:12:48', '2022-08-19 02:12:48'),
(45, 'delete_eventos', 'eventos', '2022-08-19 02:12:48', '2022-08-19 02:12:48'),
(46, 'browse_fotos', 'fotos', '2022-08-19 02:15:05', '2022-08-19 02:15:05'),
(47, 'read_fotos', 'fotos', '2022-08-19 02:15:05', '2022-08-19 02:15:05'),
(48, 'edit_fotos', 'fotos', '2022-08-19 02:15:05', '2022-08-19 02:15:05'),
(49, 'add_fotos', 'fotos', '2022-08-19 02:15:05', '2022-08-19 02:15:05'),
(50, 'delete_fotos', 'fotos', '2022-08-19 02:15:05', '2022-08-19 02:15:05'),
(56, 'browse_fotografos', 'fotografos', '2022-10-08 03:08:02', '2022-10-08 03:08:02'),
(57, 'read_fotografos', 'fotografos', '2022-10-08 03:08:02', '2022-10-08 03:08:02'),
(58, 'edit_fotografos', 'fotografos', '2022-10-08 03:08:02', '2022-10-08 03:08:02'),
(59, 'add_fotografos', 'fotografos', '2022-10-08 03:08:02', '2022-10-08 03:08:02'),
(60, 'delete_fotografos', 'fotografos', '2022-10-08 03:08:02', '2022-10-08 03:08:02'),
(61, 'browse_cidades', 'cidades', '2022-10-10 13:35:07', '2022-10-10 13:35:07'),
(62, 'read_cidades', 'cidades', '2022-10-10 13:35:07', '2022-10-10 13:35:07'),
(63, 'edit_cidades', 'cidades', '2022-10-10 13:35:07', '2022-10-10 13:35:07'),
(64, 'add_cidades', 'cidades', '2022-10-10 13:35:07', '2022-10-10 13:35:07'),
(65, 'delete_cidades', 'cidades', '2022-10-10 13:35:07', '2022-10-10 13:35:07'),
(66, 'browse_estados', 'estados', '2022-10-10 13:45:15', '2022-10-10 13:45:15'),
(67, 'read_estados', 'estados', '2022-10-10 13:45:15', '2022-10-10 13:45:15'),
(68, 'edit_estados', 'estados', '2022-10-10 13:45:15', '2022-10-10 13:45:15'),
(69, 'add_estados', 'estados', '2022-10-10 13:45:15', '2022-10-10 13:45:15'),
(70, 'delete_estados', 'estados', '2022-10-10 13:45:15', '2022-10-10 13:45:15'),
(71, 'browse_pais', 'pais', '2022-10-10 13:52:09', '2022-10-10 13:52:09'),
(72, 'read_pais', 'pais', '2022-10-10 13:52:09', '2022-10-10 13:52:09'),
(73, 'edit_pais', 'pais', '2022-10-10 13:52:09', '2022-10-10 13:52:09'),
(74, 'add_pais', 'pais', '2022-10-10 13:52:09', '2022-10-10 13:52:09'),
(75, 'delete_pais', 'pais', '2022-10-10 13:52:09', '2022-10-10 13:52:09'),
(81, 'browse_pedidos', 'pedidos', '2022-10-15 01:37:45', '2022-10-15 01:37:45'),
(82, 'read_pedidos', 'pedidos', '2022-10-15 01:37:45', '2022-10-15 01:37:45'),
(83, 'edit_pedidos', 'pedidos', '2022-10-15 01:37:45', '2022-10-15 01:37:45'),
(84, 'add_pedidos', 'pedidos', '2022-10-15 01:37:45', '2022-10-15 01:37:45'),
(85, 'delete_pedidos', 'pedidos', '2022-10-15 01:37:45', '2022-10-15 01:37:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(41, 2),
(41, 3),
(42, 1),
(42, 2),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 1),
(45, 3),
(46, 1),
(46, 2),
(46, 3),
(47, 1),
(47, 2),
(47, 3),
(48, 1),
(48, 3),
(49, 1),
(49, 3),
(50, 1),
(50, 3),
(56, 1),
(56, 2),
(56, 3),
(57, 1),
(57, 2),
(57, 3),
(58, 1),
(58, 3),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-08-19 02:06:42', '2022-08-19 02:06:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `preferences`
--

CREATE TABLE `preferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `User_id` bigint(20) UNSIGNED NOT NULL,
  `notify_emails` tinyint(1) NOT NULL DEFAULT 1,
  `notify_app` tinyint(1) NOT NULL DEFAULT 1,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(2, 'user', 'Normal User', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(3, 'fotografo', 'fotografo', '2022-08-19 23:58:56', '2022-08-19 23:58:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2022-08-19 02:06:42', '2022-08-19 02:06:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$gaLAiqQGEEmjgEJGDI4aOO.pL604a1kF3vbmffymjVyfDwPR9he3O', 'qT9GkjFwCyhUL0rUoI6VUApdfZtUa3Wpe2HgXaEMzIzLNDvsU5JCsNUXHt8X', NULL, '2022-08-19 02:06:42', '2022-08-19 02:06:42'),
(2, 2, 'user', 'user@user.com', 'users/default.png', NULL, '$2y$10$bQcCOFNxeC9dt5K.oyNuNOYLA82ryq8G966U2msSOTYubZKayaiO6', NULL, '{\"locale\":\"en\"}', '2022-08-19 23:58:15', '2022-08-19 23:58:15'),
(3, 3, 'Fotografo', 'foto@foto.com', 'users/default.png', NULL, '$2y$10$1xoM1oV4h8db2p131j5reeiZT4t3duMtbZ8Q9JsivCL/IHayHNPsG', NULL, '{\"locale\":\"en\"}', '2022-08-20 20:12:28', '2022-08-20 20:12:28'),
(4, 3, 'Ana', 'ana@foto.com', 'users/default.png', NULL, '$2y$10$ofKfOy9.fo27.C86dlorUuj6TF18yrcHWF7bcfg5UZgPMlgmP2D6C', NULL, '{\"locale\":\"en\"}', '2022-09-18 03:21:54', '2022-09-18 03:21:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Índices para tabela `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `fotografos`
--
ALTER TABLE `fotografos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Índices para tabela `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Índices para tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pais_sigla_unique` (`sigla`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Índices para tabela `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Índices para tabela `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preferences_user_id_foreign` (`User_id`);

--
-- Índices para tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Índices para tabela `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Índices para tabela `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Índices para tabela `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de tabela `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fotografos`
--
ALTER TABLE `fotografos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `preferences_user_id_foreign` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Limitadores para a tabela `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
