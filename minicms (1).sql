-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 18 2020 г., 14:26
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `minicms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id_article` int(10) UNSIGNED NOT NULL,
  `title_article` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_article` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_article` date NOT NULL,
  `cat` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id_article`, `title_article`, `description_article`, `main_img`, `date_article`, `cat`) VALUES
(2, 'Кулинария гайд', 'Краткое описание', 'images/', '2020-05-17', 3),
(3, 'Test', 'Test', 'images/', '2020-05-17', 1),
(4, 'tesew', 'sdgds', 'images/', '2020-05-18', 75);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` tinyint(3) UNSIGNED NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Новости'),
(2, 'Галерея'),
(3, 'Гайды'),
(4, 'Рецепты'),
(5, 'Лошади'),
(6, 'Карты'),
(7, 'Боссы'),
(8, 'Продукты'),
(9, 'Мясо, морепродукты, охотничьи трофеи'),
(10, 'Реагенты'),
(11, 'Редкие ресурсы'),
(12, 'Порошки'),
(13, 'Грибы'),
(14, 'Травы'),
(15, 'Кораллы'),
(16, 'Кровь'),
(17, 'Кожа'),
(18, 'Руда'),
(19, 'Металлы'),
(20, 'Драгоценные камни'),
(21, 'Древесина'),
(22, 'Доски'),
(23, 'Ткани'),
(24, 'Перья'),
(25, 'Зелья'),
(26, 'Еда'),
(27, 'Разное'),
(28, 'Без категории'),
(29, 'Алхимические камни'),
(30, 'Заточки и печати'),
(31, 'Инструменты'),
(32, 'Предметы для питомцев'),
(33, 'Предметы для огорода'),
(34, 'Семена'),
(35, 'Основные доспехи'),
(36, 'Шлемы'),
(37, 'Перчатки'),
(38, 'Обувь'),
(39, 'Талисманы'),
(40, 'Амулеты'),
(41, 'Луки'),
(42, 'Кинжалы'),
(43, 'Топоры'),
(44, 'Темляки'),
(45, 'Мечи'),
(46, 'Щиты'),
(47, 'Клинки'),
(48, 'Брелки'),
(49, 'Посохи'),
(50, 'Кинжалы'),
(51, 'Ожерелья'),
(52, 'Серьги'),
(53, 'Кольца'),
(54, 'Пояса'),
(55, 'В шлем'),
(56, 'В доспех'),
(57, 'В перчатки'),
(58, 'В обувь'),
(59, 'В оружие'),
(60, 'В доп. оружие'),
(61, 'В любой слот'),
(62, 'Повозки'),
(63, 'Крыши'),
(64, 'Знамена'),
(65, 'Колеса'),
(66, 'Вывески'),
(67, 'Лодки'),
(68, 'Трюмы'),
(69, 'Такелаж'),
(70, 'Водорезы'),
(71, 'С рудой и металлами'),
(72, 'С деревом'),
(73, 'Кулинарные'),
(74, 'Алхимические'),
(75, 'Стримеры');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id_menu` tinyint(3) UNSIGNED NOT NULL,
  `name_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_menu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id_menu`, `name_menu`, `text_menu`, `img_src`) VALUES
(1, 'Новости', 'Сайт посвящен игре BlackDesert', ''),
(2, 'Галерея', 'Галерея игры BlackDesert', ''),
(3, 'Гайды', 'Гайды по игре BlackDesert', ''),
(4, 'Рецепты', 'Рецепты по игре BlackDesert', ''),
(5, 'Лошади', 'Лошади из игры BlackDesert', ''),
(6, 'Карты', 'Карты по игре BlackDesert', '');

-- --------------------------------------------------------

--
-- Структура таблицы `paragraph`
--

CREATE TABLE `paragraph` (
  `id_pgh` int(10) UNSIGNED NOT NULL,
  `id_article` int(11) NOT NULL,
  `paragraphs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_pgh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `paragraph`
--

INSERT INTO `paragraph` (`id_pgh`, `id_article`, `paragraphs`, `img_pgh`) VALUES
(1, 1, 'dasdasdasd', 'images/'),
(2, 1, 'dsadsadas', 'images/'),
(3, 1, '', 'images/'),
(4, 2, 'Развитие#\r\n\r\nДойдя до этого пункта, у вас уже есть все необходимые предметы, поэтому сразу о готовке. С Новичка и до Грандмастера (а некоторые и до Специалиста) качаются на Чистом Алкоголе (400 опыта) , Уксусе (400 опыта) и Соленьях (700 опыта) . Рецепты вы можете найти также на Кодексе - https://bdocodex.com/ru/recipes/culinary/. Основной плюс такой готовки – всё это можно легко продать на аукционе или использовать в дальнейшей готовке. Фрукты и овощи (клубника и паприка соответственно) покупаются у Милано Беллучи, которая упомянута в “Полезных НПС”. Злаки – пшеница, кукуруза, картофель, ячмень, батат – добываются рабочими с узлов: Северное поле пшеницы, Ферма Лоджи и т.д. Подробно про узлы вы можете посмотреть на карте - https://bdotools.xyz/map/. Муку можно легко купить на аукционе или намолоть самому как раз из тех злаков, что\r\n\r\nдобыли рабочие. Дрожжи и сахар покупаются у трактирщика. После того как достигли Мастера (пара часов под бафами) можете думать о том, что сдавать до того, как возьмёте Грандмастера (в зависимости от онлайна может уйти пара дней, но можно взять и за сутки). Всю прибыль вы можете посчитать благодаря таблице с EU-сервера - https://docs.google.com/spreadsheets/d/1D7mFcXYFm4BUS_MKxTvgBY2lXkGtwWqn2AW91ntUvzE/edit#gid=2097085313 - и выбрать по ней лучшее для вас блюдо. Пара слов о применении таблицы:\r\n\r\n1. Создайте копию: Файл - Создать копию;\r\n\r\n2. Измените регион на RU (‘Tax’ можете не трогать);\r\n\r\n3. Перейдите во вкладку Cooking – измените там синие ячейки;\r\n\r\n4. Затем перейдите во вкладку Prices – поставьте галочки напротив каждого предмета, который добываете сами или рабочие;\r\n\r\n5. Перейдите во вкладку TLDR – выберите, что хотите готовить.\r\n\r\nКак только вы дошли до Грандмастера, начинайте готовить ингредиенты для паков Специалиста, а то есть обедов (о местах сбора в отдельном гайде (-ах))', 'images/'),
(5, 2, 'Деликатес ведьмы#\r\n\r\nВо время готовки с шансом 1.5-3% будет прокать [Деликатес ведьмы] . Если вы хотите поднять очки влияния, и при этом сдавать больше имперских паков, то все деликатесы меняйте исключительно на очки влияния. Вместе с влиянием вы также будете получать опыт кулинарии, поэтому по 600-700 деликатесов вы можете сдать на твинах, чтобы поднять ремесленный и общий рейтинг семьи (15 очков за Эксперт-1).', 'images/'),
(6, 2, 'Полезные ссылки#\r\n1. Карта мира - https://bdotools.xyz/map/ \r\n2. BDO Codex - https://bdocodex.com/ru/recipes/culinary/\r\n\r\n3. Имперская кулинария - https://docs.google.com/spreadsheets/d/1D7mFcXYFm4BUS_MKxTvgBY2lXkGtwWqn2AW91ntUvzE/edit#gid=2097085313\r\n\r\n4. Расчет влияния - https://docs.google.com/spreadsheets/d/12GAnNzfc9a4zQDuAhIII7DcYUi9WUEwKnodLs6shgBk/edit#gid=1665481533', 'images/'),
(7, 2, 'Развитие#\r\n\r\nДойдя до этого пункта, у вас уже есть все необходимые предметы, поэтому сразу о готовке. С Новичка и до Грандмастера (а некоторые и до Специалиста) качаются на Чистом Алкоголе (400 опыта) , Уксусе (400 опыта) и Соленьях (700 опыта) . Рецепты вы можете найти также на Кодексе - https://bdocodex.com/ru/recipes/culinary/. Основной плюс такой готовки – всё это можно легко продать на аукционе или использовать в дальнейшей готовке. Фрукты и овощи (клубника и паприка соответственно) покупаются у Милано Беллучи, которая упомянута в “Полезных НПС”. Злаки – пшеница, кукуруза, картофель, ячмень, батат – добываются рабочими с узлов: Северное поле пшеницы, Ферма Лоджи и т.д. Подробно про узлы вы можете посмотреть на карте - https://bdotools.xyz/map/. Муку можно легко купить на аукционе или намолоть самому как раз из тех злаков, что\r\n\r\nдобыли рабочие. Дрожжи и сахар покупаются у трактирщика. После того как достигли Мастера (пара часов под бафами) можете думать о том, что сдавать до того, как возьмёте Грандмастера (в зависимости от онлайна может уйти пара дней, но можно взять и за сутки). Всю прибыль вы можете посчитать благодаря таблице с EU-сервера - https://docs.google.com/spreadsheets/d/1D7mFcXYFm4BUS_MKxTvgBY2lXkGtwWqn2AW91ntUvzE/edit#gid=2097085313 - и выбрать по ней лучшее для вас блюдо. Пара слов о применении таблицы:\r\n\r\n1. Создайте копию: Файл - Создать копию;\r\n\r\n2. Измените регион на RU (‘Tax’ можете не трогать);\r\n\r\n3. Перейдите во вкладку Cooking – измените там синие ячейки;\r\n\r\n4. Затем перейдите во вкладку Prices – поставьте галочки напротив каждого предмета, который добываете сами или рабочие;\r\n\r\n5. Перейдите во вкладку TLDR – выберите, что хотите готовить.\r\n\r\nКак только вы дошли до Грандмастера, начинайте готовить ингредиенты для паков Специалиста, а то есть обедов (о местах сбора в отдельном гайде (-ах))', 'images/'),
(8, 2, 'Деликатес ведьмы#\r\n\r\nВо время готовки с шансом 1.5-3% будет прокать [Деликатес ведьмы] . Если вы хотите поднять очки влияния, и при этом сдавать больше имперских паков, то все деликатесы меняйте исключительно на очки влияния. Вместе с влиянием вы также будете получать опыт кулинарии, поэтому по 600-700 деликатесов вы можете сдать на твинах, чтобы поднять ремесленный и общий рейтинг семьи (15 очков за Эксперт-1).', 'images/'),
(9, 2, 'Полезные ссылки#\r\n1. Карта мира - https://bdotools.xyz/map/ \r\n2. BDO Codex - https://bdocodex.com/ru/recipes/culinary/\r\n\r\n3. Имперская кулинария - https://docs.google.com/spreadsheets/d/1D7mFcXYFm4BUS_MKxTvgBY2lXkGtwWqn2AW91ntUvzE/edit#gid=2097085313\r\n\r\n4. Расчет влияния - https://docs.google.com/spreadsheets/d/12GAnNzfc9a4zQDuAhIII7DcYUi9WUEwKnodLs6shgBk/edit#gid=1665481533', 'images/'),
(10, 2, 'Развитие#\r\n\r\nДойдя до этого пункта, у вас уже есть все необходимые предметы, поэтому сразу о готовке. С Новичка и до Грандмастера (а некоторые и до Специалиста) качаются на Чистом Алкоголе (400 опыта) , Уксусе (400 опыта) и Соленьях (700 опыта) . Рецепты вы можете найти также на Кодексе - https://bdocodex.com/ru/recipes/culinary/. Основной плюс такой готовки – всё это можно легко продать на аукционе или использовать в дальнейшей готовке. Фрукты и овощи (клубника и паприка соответственно) покупаются у Милано Беллучи, которая упомянута в “Полезных НПС”. Злаки – пшеница, кукуруза, картофель, ячмень, батат – добываются рабочими с узлов: Северное поле пшеницы, Ферма Лоджи и т.д. Подробно про узлы вы можете посмотреть на карте - https://bdotools.xyz/map/. Муку можно легко купить на аукционе или намолоть самому как раз из тех злаков, что\r\n\r\nдобыли рабочие. Дрожжи и сахар покупаются у трактирщика. После того как достигли Мастера (пара часов под бафами) можете думать о том, что сдавать до того, как возьмёте Грандмастера (в зависимости от онлайна может уйти пара дней, но можно взять и за сутки). Всю прибыль вы можете посчитать благодаря таблице с EU-сервера - https://docs.google.com/spreadsheets/d/1D7mFcXYFm4BUS_MKxTvgBY2lXkGtwWqn2AW91ntUvzE/edit#gid=2097085313 - и выбрать по ней лучшее для вас блюдо. Пара слов о применении таблицы:\r\n\r\n1. Создайте копию: Файл - Создать копию;\r\n\r\n2. Измените регион на RU (‘Tax’ можете не трогать);\r\n\r\n3. Перейдите во вкладку Cooking – измените там синие ячейки;\r\n\r\n4. Затем перейдите во вкладку Prices – поставьте галочки напротив каждого предмета, который добываете сами или рабочие;\r\n\r\n5. Перейдите во вкладку TLDR – выберите, что хотите готовить.\r\n\r\nКак только вы дошли до Грандмастера, начинайте готовить ингредиенты для паков Специалиста, а то есть обедов (о местах сбора в отдельном гайде (-ах))', 'images/'),
(11, 2, 'Деликатес ведьмы#\r\n\r\nВо время готовки с шансом 1.5-3% будет прокать [Деликатес ведьмы] . Если вы хотите поднять очки влияния, и при этом сдавать больше имперских паков, то все деликатесы меняйте исключительно на очки влияния. Вместе с влиянием вы также будете получать опыт кулинарии, поэтому по 600-700 деликатесов вы можете сдать на твинах, чтобы поднять ремесленный и общий рейтинг семьи (15 очков за Эксперт-1).', 'images/'),
(12, 2, 'Полезные ссылки#\r\n1. Карта мира - https://bdotools.xyz/map/ \r\n2. BDO Codex - https://bdocodex.com/ru/recipes/culinary/\r\n\r\n3. Имперская кулинария - https://docs.google.com/spreadsheets/d/1D7mFcXYFm4BUS_MKxTvgBY2lXkGtwWqn2AW91ntUvzE/edit#gid=2097085313\r\n\r\n4. Расчет влияния - https://docs.google.com/spreadsheets/d/12GAnNzfc9a4zQDuAhIII7DcYUi9WUEwKnodLs6shgBk/edit#gid=1665481533', 'images/'),
(13, 3, 'Test', 'images/'),
(14, 4, 'gsd', 'images/');

-- --------------------------------------------------------

--
-- Структура таблицы `statti`
--

CREATE TABLE `statti` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `img_src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(2, 'megaboss', 'ceb8447cc4ab78d2ec34cd9f11e4bed2'),
(3, '', ''),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Индексы таблицы `paragraph`
--
ALTER TABLE `paragraph`
  ADD PRIMARY KEY (`id_pgh`);

--
-- Индексы таблицы `statti`
--
ALTER TABLE `statti`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `paragraph`
--
ALTER TABLE `paragraph`
  MODIFY `id_pgh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `statti`
--
ALTER TABLE `statti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
