<?php

namespace App\DataFixtures;

use App\Entity\Error;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ErrorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $error = new Error(0, '01М1-Левая Фреза - Главный контактор - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(1, '01М1-Левая Фреза - Контактор  "Треугольник"-Ошибка ОС');
        $manager->persist($error);
        $error = new Error(2, '01М1-Левая Фреза - Контактор  "Звезда"-Ошибка ОС');
        $manager->persist($error);
        $error = new Error(3, '02М1-Правая Фреза - Главный контактор - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(4, '02М1-Правая Фреза-Контактор  "Треугольник"-Ошибка ОС');
        $manager->persist($error);
        $error = new Error(5, '02М1-Правая Фреза - Контактор  "Звезда" - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(6, '03М1-Верхняя Фреза - Главный контактор - Ошибка ОС');
        $manager->persist($error);
    
        $error = new Error(7, '03М1-Верхняя Фреза-Контактор  "Треугольник"-Ошибка ОС');
        $manager->persist($error);
        $error = new Error(8, '03М1-Верхняя Фреза - Контактор  "Звезда" - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(9, '04М1-Нижняя Фреза - Главный контактор - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(10, '04М1-Нижняя Фреза-Контактор  "Треугольник"-Ошибка ОС');
        $manager->persist($error);
        $error = new Error(11, '04М1-Нижняя Фреза-Контактор  "Звезда" - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(12, '05М1-Левая Пила-Главный контактор - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(13, '05М1-Левая Пила-Контактор  "Треугольник" - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(14, '05М1-Левая Пила-Контактор  "Звезда" - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(15, '06М1-Правая Пила-Главный контактор - Ошибка ОС');
        $manager->persist($error);
    
        $error = new Error(16, '06М1-Правая Пила-Контактор  "Треугольник" - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(17, '06М1-Правая Пила-Контактор  "Звезда" - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(18, 'Инвертор FC07-08 -Блок SE -Главный контатор - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(19, 'Инвертор-Обрезной Рабочий Инструмент - Ошибка');
        $manager->persist($error);
        $error = new Error(20, 'Терморезисторы - Блок SE - ошибка');
        $manager->persist($error);
        $error = new Error(21, 'Error_21');
        $manager->persist($error);
        $error = new Error(22, 'Error_22');
        $manager->persist($error);
        $error = new Error(23, 'Error_23');
        $manager->persist($error);
    
        $error = new Error(24, '01М1-Левая Фреза - Главный контактор - Залип');
        $manager->persist($error);
        $error = new Error(25, '01М1-Левая Фреза - Контактор  "Треугольник" - Залип');
        $manager->persist($error);
        $error = new Error(26, '01М1-Левая Фреза - Контактор  "Звезда" - Залип');
        $manager->persist($error);
        $error = new Error(27, '02М1-Правая Фреза - Главный контактор - Залип');
        $manager->persist($error);
        $error = new Error(28, '02М1-Правая Фреза - Контактор  "Треугольник" - Залип');
        $manager->persist($error);
        $error = new Error(29, '02М1-Правая Фреза - Контактор  "Звезда" - Залип');
        $manager->persist($error);
        $error = new Error(30, '03М1-Верхняя Фреза - Главный контактор - Залип');
        $manager->persist($error);
        $error = new Error(31, '03М1-Верхняя Фреза - Контактор  "Треугольник" - Залип');
        $manager->persist($error);
    
        $error = new Error(32, '03М1-Верхняя Фреза - Контактор  "Звезда" - Залип');
        $manager->persist($error);
        $error = new Error(33, '04М1-Нижняя Фреза - Главный контактор - Залип');
        $manager->persist($error);
        $error = new Error(34, '04М1-Нижняя Фреза- Контактор  "Треугольник" - Залип');
        $manager->persist($error);
        $error = new Error(35, '04М1-Нижняя Фреза- Контактор  "Звезда" - Залип');
        $manager->persist($error);
        $error = new Error(36, '05М1-Левая Пила- Главный контактор - Залип');
        $manager->persist($error);
        $error = new Error(37, '05М1-Левая Пила- Контактор  "Треугольник" - Залип');
        $manager->persist($error);
        $error = new Error(38, '05М1-Левая Пила- Контактор  "Звезда" - Залип');
        $manager->persist($error);
        $error = new Error(39, '06М1-Правая Пила- Главный контактор - Залип');
        $manager->persist($error);
    
        $error = new Error(40, '06М1-Правая Пила- Контактор  "Треугольник" - Залип');
        $manager->persist($error);
        $error = new Error(41, '06М1-Правая Пила- Контактор  "Звезда" - Залип');
        $manager->persist($error);
        $error = new Error(42, 'Инвертор FC07-08 - Блок SE - Главный КМ - Залип');
        $manager->persist($error);
        $error = new Error(43, 'Error_43');
        $manager->persist($error);
        $error = new Error(44, 'Error_44');
        $manager->persist($error);
        $error = new Error(45, 'Error_45');
        $manager->persist($error);
        $error = new Error(46, 'Error_46');
        $manager->persist($error);
        $error = new Error(47, 'Error_47');
        $manager->persist($error);
    
        $error = new Error(48, '01М1-Левая Фреза - Тепловое реле ( 0-Ок ) - Авария');
        $manager->persist($error);
        $error = new Error(49, '02М1-Правая Фреза - Тепловое реле ( 0-Ок ) - Авария');
        $manager->persist($error);
        $error = new Error(50, '03М1-Верхняя Фреза - Тепловое реле ( 0-Ок ) - Авария');
        $manager->persist($error);
        $error = new Error(51, '04М1-Нижняя Фреза - Тепловое реле ( 0-Ок ) - Авария');
        $manager->persist($error);
        $error = new Error(52, '05М1-Левая Пила - Тепловое реле ( 0-Ок ) - Авария');
        $manager->persist($error);
        $error = new Error(53, '06М1-Правая Пила - Тепловое реле ( 0-Ок ) - Авария');
        $manager->persist($error);
        $error = new Error(54, 'Error_54');
        $manager->persist($error);
        $error = new Error(55, 'Error_55');
        $manager->persist($error);
    
        $error = new Error(56, 'Контактор - питание инвертора - Выходные двигателя подачи - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(57, 'Инвертор - Выходные двигателя подачи - Авария');
        $manager->persist($error);
        $error = new Error(58, 'Контактор - Питание инвертора - Входные двигателя подачи - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(59, 'Инвертор - Входные двигателя подачи - Авария');
        $manager->persist($error);
        $error = new Error(60, 'Контактор - питание инвертора - Измерительный конвеер - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(61, 'Инвертор - Измерительный конвеер - Авария');
        $manager->persist($error);
        $error = new Error(62, 'Регулировка горизонтальной Фрезы - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(63, 'Регулировка горизонтальной Фрезы - Ошибка инвертора');
        $manager->persist($error);
    
        $error = new Error(64, 'Регулировка Верхней Фрезы - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(65, 'Регулировка Верхней Фрезы - ошибка Инвертора');
        $manager->persist($error);
        $error = new Error(66, 'Регулировка Нижней Фрезы - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(67, 'Регулировка Нижней Фрезы - ошибка Инвертора');
        $manager->persist($error);
        $error = new Error(68, 'Регулировка Верхний обрезной блок - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(69, 'Регулировка Верхний обрезной блок - ошибка Инвертора');
        $manager->persist($error);
        $error = new Error(70, 'Регулировка Нижний обрезной блок - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(71, 'Регулировка Нижний обрезной блок - ошибка Инвертора');
        $manager->persist($error);
    
        $error = new Error(72, '13М1 - Вентилятор - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(73, 'Двиг. 1е Гидравл. Ролики 16М1 - ошибка ОС');
        $manager->persist($error);
        $error = new Error(74, 'Инвертор FC16 - ошибка');
        $manager->persist($error);
        $error = new Error(75, 'Двиг. 2е Гидравл. Ролики 21М1-21М2 - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(76, 'FC21 Инвертор - Ошибка Инвертора');
        $manager->persist($error);
        $error = new Error(77, '17М1: Гидроцентр - ошибка ОС');
        $manager->persist($error);
        $error = new Error(78, 'Двиг. Охлаждения Гидроцентра 17М2 - Ошибка ОС');
        $manager->persist($error);
        $error = new Error(79, 'Гидроцентр -Уровень масла -"MIN"');
        $manager->persist($error);
    
        $error = new Error(80, 'Гидроцентр - Температура масла -"МАХ"');
        $manager->persist($error);
        $error = new Error(81, 'Гидроцентр -ФИЛЬТР  масла -"Требует очистки"');
        $manager->persist($error);
        $error = new Error(82, 'Дробительные Фрезы - Ключ безопасности - открытый');
        $manager->persist($error);
        $error = new Error(83, 'Левая Продольная пила - Ключ безопасности - открытый');
        $manager->persist($error);
        $error = new Error(84, 'Правая Продольная Пила - Ключ безопасности - открытый');
        $manager->persist($error);
        $error = new Error(85, 'Обрезной Рабочий Инструмент -Ключ безопасности  открыт');
        $manager->persist($error);
        $error = new Error(86, 'Левая Пусковая Блокировка - Ключ безопасности  открыт');
        $manager->persist($error);
        $error = new Error(87, 'Правая Пусковая Блокировка -Ключ безопасности - открыт');
        $manager->persist($error);
    
        $error = new Error(88, 'Min уровень масла смазки "СОФИМАТИК"');
        $manager->persist($error);
        $error = new Error(89, 'Sew Eurodrive - LogIn - ошибка инвертора');
        $manager->persist($error);
        $error = new Error(90, '20М1: Водяной насос - ошибка ОС');
        $manager->persist($error);
        $error = new Error(91, 'Error_91');
        $manager->persist($error);
        $error = new Error(92, 'Error_92');
        $manager->persist($error);
        $error = new Error(93, 'Error_93');
        $manager->persist($error);
        $error = new Error(94, 'Error_94');
        $manager->persist($error);
        $error = new Error(95, 'Error_95');
        $manager->persist($error);
    
        $error = new Error(96, 'Error_96');
        $manager->persist($error);
        $error = new Error(97, 'Error_97');
        $manager->persist($error);
        $error = new Error(98, 'Error_98');
        $manager->persist($error);
        $error = new Error(99, 'Error_99');
        $manager->persist($error);
        $error = new Error(100, 'Error_100');
        $manager->persist($error);
        $error = new Error(101, 'Error_101');
        $manager->persist($error);
        $error = new Error(102, 'Error_102');
        $manager->persist($error);
        $error = new Error(103, 'Error_103');
        $manager->persist($error);
    
        $error = new Error(104, 'Error_104');
        $manager->persist($error);
        $error = new Error(105, 'Error_105');
        $manager->persist($error);
        $error = new Error(106, 'Error_106');
        $manager->persist($error);
        $error = new Error(107, 'Error_107');
        $manager->persist($error);
        $error = new Error(108, 'Error_108');
        $manager->persist($error);
        $error = new Error(109, 'Error_109');
        $manager->persist($error);
        $error = new Error(110, 'Error_110');
        $manager->persist($error);
        $error = new Error(111, 'Error_111');
        $manager->persist($error);
    
        $error = new Error(112, 'Error_112');
        $manager->persist($error);
        $error = new Error(113, 'Error_113');
        $manager->persist($error);
        $error = new Error(114, 'Error_114');
        $manager->persist($error);
        $error = new Error(115, 'Error_115');
        $manager->persist($error);
        $error = new Error(116, 'Error_116');
        $manager->persist($error);
        $error = new Error(117, 'Error_117');
        $manager->persist($error);
        $error = new Error(118, 'Error_118');
        $manager->persist($error);
        $error = new Error(119, 'Error_119');
        $manager->persist($error);
    
        $error = new Error(120, 'Error_120');
        $manager->persist($error);
        $error = new Error(121, 'Error_121');
        $manager->persist($error);
        $error = new Error(122, 'Error_122');
        $manager->persist($error);
        $error = new Error(123, 'Error_123');
        $manager->persist($error);
        $error = new Error(124, 'Error_124');
        $manager->persist($error);
        $error = new Error(125, 'Error_125');
        $manager->persist($error);
        $error = new Error(126, 'Error_126');
        $manager->persist($error);
        $error = new Error(127, 'Error_127');
        $manager->persist($error);
    
        $error = new Error(128, 'Error_128');
        $manager->persist($error);
        $error = new Error(129, 'Error_129');
        $manager->persist($error);
        $error = new Error(130, 'Error_130');
        $manager->persist($error);
        $error = new Error(131, 'Error_131');
        $manager->persist($error);
        $error = new Error(132, 'Error_132');
        $manager->persist($error);
        $error = new Error(133, 'Error_133');
        $manager->persist($error);
        $error = new Error(134, 'Error_134');
        $manager->persist($error);
        $error = new Error(135, 'Error_135');
        $manager->persist($error);
    
        $error = new Error(136, 'Error_136');
        $manager->persist($error);
        $error = new Error(137, 'Error_137');
        $manager->persist($error);
        $error = new Error(138, 'Error_1338');
        $manager->persist($error);
        $error = new Error(139, 'Error_139');
        $manager->persist($error);
        $error = new Error(140, 'Error_140');
        $manager->persist($error);
        $error = new Error(141, 'Error_141');
        $manager->persist($error);
        $error = new Error(142, 'Error_142');
        $manager->persist($error);
        $error = new Error(143, 'Error_143');
        $manager->persist($error);
    
        $error = new Error(144, 'Error_144');
        $manager->persist($error);
        $error = new Error(145, 'Error_145');
        $manager->persist($error);
        $error = new Error(146, 'Error_146');
        $manager->persist($error);
        $error = new Error(147, 'Error_147');
        $manager->persist($error);
        $error = new Error(148, 'Error_148');
        $manager->persist($error);
        $error = new Error(149, 'Error_149');
        $manager->persist($error);
        $error = new Error(150, 'Error_150');
        $manager->persist($error);
        $error = new Error(151, 'Error_151');
        $manager->persist($error);
    
        $error = new Error(152, 'Error_152');
        $manager->persist($error);
        $error = new Error(153, 'Error_153');
        $manager->persist($error);
        $error = new Error(154, 'Error_154');
        $manager->persist($error);
        $error = new Error(155, 'Error_155');
        $manager->persist($error);
        $error = new Error(156, 'Error_156');
        $manager->persist($error);
        $error = new Error(157, 'Error_157');
        $manager->persist($error);
        $error = new Error(158, 'Error_158');
        $manager->persist($error);
        $error = new Error(159, 'Error_159');
        $manager->persist($error);
    
        $error = new Error(160, 'Error_160');
        $manager->persist($error);
        $error = new Error(161, 'Error_161');
        $manager->persist($error);
        $error = new Error(162, 'Error_162');
        $manager->persist($error);
        $error = new Error(163, 'Error_163');
        $manager->persist($error);
        $error = new Error(164, 'Error_164');
        $manager->persist($error);
        $error = new Error(165, 'Error_165');
        $manager->persist($error);
        $error = new Error(166, 'Error_166');
        $manager->persist($error);
        $error = new Error(167, 'Error_167');
        $manager->persist($error);
    
        $error = new Error(168, 'Error_168');
        $manager->persist($error);
        $error = new Error(169, 'Error_169');
        $manager->persist($error);
        $error = new Error(170, 'Error_170');
        $manager->persist($error);
        $error = new Error(171, 'Error_171');
        $manager->persist($error);
        $error = new Error(172, 'Error_172');
        $manager->persist($error);
        $error = new Error(173, 'Error_173');
        $manager->persist($error);
        $error = new Error(174, 'Error_174');
        $manager->persist($error);
        $error = new Error(175, 'Error_175');
        $manager->persist($error);
    
        $error = new Error(176, 'Error_176');
        $manager->persist($error);
        $error = new Error(177, 'Error_177');
        $manager->persist($error);
        $error = new Error(178, 'Error_178');
        $manager->persist($error);
        $error = new Error(179, 'Error_179');
        $manager->persist($error);
        $error = new Error(180, 'Error_180');
        $manager->persist($error);
        $error = new Error(181, 'Error_181');
        $manager->persist($error);
        $error = new Error(182, 'Error_182');
        $manager->persist($error);
        $error = new Error(183, 'Error_183');
        $manager->persist($error);
    
        $error = new Error(184, 'Error_184');
        $manager->persist($error);
        $error = new Error(185, 'Error_185');
        $manager->persist($error);
        $error = new Error(186, 'Error_186');
        $manager->persist($error);
        $error = new Error(187, 'Error_187');
        $manager->persist($error);
        $error = new Error(188, 'Error_188');
        $manager->persist($error);
        $error = new Error(189, 'Error_189');
        $manager->persist($error);
        $error = new Error(190, 'Error_190');
        $manager->persist($error);
        $error = new Error(191, 'Error_191');
        $manager->persist($error);
    
        $error = new Error(192, 'Error_192');
        $manager->persist($error);
        $error = new Error(193, 'Error_193');
        $manager->persist($error);
        $error = new Error(194, 'Error_194');
        $manager->persist($error);
        $error = new Error(195, 'Error_195');
        $manager->persist($error);
        $error = new Error(196, 'Error_196');
        $manager->persist($error);
        $error = new Error(197, 'Error_197');
        $manager->persist($error);
        $error = new Error(198, 'Error_198');
        $manager->persist($error);
        $error = new Error(199, 'Error_199');
        $manager->persist($error);
    
        $error = new Error(200, 'Error_200');
        $manager->persist($error);
        $error = new Error(201, 'Error_201');
        $manager->persist($error);
        $error = new Error(202, 'Error_202');
        $manager->persist($error);
        $error = new Error(203, 'Error_203');
        $manager->persist($error);
        $error = new Error(204, 'Error_204');
        $manager->persist($error);
        $error = new Error(205, 'Error_205');
        $manager->persist($error);
        $error = new Error(206, 'Error_206');
        $manager->persist($error);
        $error = new Error(207, 'Error_207');
        $manager->persist($error);
    
        $error = new Error(208, 'Error_208');
        $manager->persist($error);
        $error = new Error(209, 'Error_209');
        $manager->persist($error);
        $error = new Error(210, 'Error_210');
        $manager->persist($error);
        $error = new Error(211, 'Error_211');
        $manager->persist($error);
        $error = new Error(212, 'Error_212');
        $manager->persist($error);
        $error = new Error(213, 'Error_213');
        $manager->persist($error);
        $error = new Error(214, 'Error_214');
        $manager->persist($error);
        $error = new Error(215, 'Error_215');
        $manager->persist($error);
    
        $error = new Error(216, 'Error_216');
        $manager->persist($error);
        $error = new Error(217, 'Error_217');
        $manager->persist($error);
        $error = new Error(218, 'Error_218');
        $manager->persist($error);
        $error = new Error(219, 'Error_219');
        $manager->persist($error);
        $error = new Error(220, 'Error_220');
        $manager->persist($error);
        $error = new Error(221, 'Error_221');
        $manager->persist($error);
        $error = new Error(222, 'Error_222');
        $manager->persist($error);
        $error = new Error(223, 'Error_223');
        $manager->persist($error);
    
        $error = new Error(224, 'Error_224');
        $manager->persist($error);
        $error = new Error(225, 'Error_225');
        $manager->persist($error);
        $error = new Error(226, 'Error_226');
        $manager->persist($error);
        $error = new Error(227, 'Error_227');
        $manager->persist($error);
        $error = new Error(228, 'Error_228');
        $manager->persist($error);
        $error = new Error(229, 'Error_229');
        $manager->persist($error);
        $error = new Error(230, 'Error_230');
        $manager->persist($error);
        $error = new Error(231, 'Error_231');
        $manager->persist($error);
    
        $error = new Error(232, 'Error_232');
        $manager->persist($error);
        $error = new Error(233, 'Error_233');
        $manager->persist($error);
        $error = new Error(234, 'Error_234');
        $manager->persist($error);
        $error = new Error(235, 'Error_235');
        $manager->persist($error);
        $error = new Error(236, 'Error_236');
        $manager->persist($error);
        $error = new Error(237, 'Error_237');
        $manager->persist($error);
        $error = new Error(238, 'Error_238');
        $manager->persist($error);
        $error = new Error(239, 'Error_239');
        $manager->persist($error);
    
        $error = new Error(240, 'Error_240');
        $manager->persist($error);
        $error = new Error(241, 'Error_241');
        $manager->persist($error);
        $error = new Error(242, 'Error_242');
        $manager->persist($error);
        $error = new Error(243, 'Error_243');
        $manager->persist($error);
        $error = new Error(244, 'Error_244');
        $manager->persist($error);
        $error = new Error(245, 'Error_245');
        $manager->persist($error);
        $error = new Error(246, 'Error_246');
        $manager->persist($error);
        $error = new Error(247, 'Error_247');
        $manager->persist($error);
    
        $error = new Error(248, 'Error_248');
        $manager->persist($error);
        $error = new Error(249, 'Error_249');
        $manager->persist($error);
        $error = new Error(250, 'Error_250');
        $manager->persist($error);
        $error = new Error(251, 'Error_251');
        $manager->persist($error);
        $error = new Error(252, 'Error_252');
        $manager->persist($error);
        $error = new Error(253, 'Error_253');
        $manager->persist($error);
        $error = new Error(254, 'Error_254');
        $manager->persist($error);
        $error = new Error(255, 'Error_255');
        $manager->persist($error);

        $manager->flush();
    }
}