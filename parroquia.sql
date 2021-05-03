-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2020 a las 02:46:10
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parroquia`
--
CREATE DATABASE IF NOT EXISTS `parroquia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `parroquia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Publi` int(11) NOT NULL,
  `Comentario` varchar(150) NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`ID`, `ID_User`, `ID_Publi`, `Comentario`, `Fecha`, `Estado`) VALUES
(0, 2, 5, 'Muy buen articulo!', '2020-08-24', 1),
(1, 2, 2, 'Wow!', '2020-08-27', 1),
(2, 3, 5, 'Excelente Articulo!', '2020-08-29', 1),
(3, 3, 4, 'Interesante', '2020-08-29', 1),
(4, 2, 1, '¡Qué lindo mensaje! ¡Muy conmovedor!', '2020-08-29', 1),
(5, 2, 3, 'Qué lamentable situación :(.', '2020-08-29', 1),
(6, 4, 4, '¡Increíble!', '2020-08-29', 1),
(7, 1, 9, 'x', '2020-09-06', 0),
(8, 1, 8, 'z', '2020-09-06', 1),
(9, 1, 8, '1', '2020-09-06', 0),
(10, 4, 8, 'Hola!', '2020-09-08', 1),
(11, 1, 5, 'Adios', '2020-09-19', 0),
(12, 1, 6, 'edewfwefwevwevewve', '2020-10-24', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evangelio`
--

CREATE TABLE `evangelio` (
  `ID` int(11) NOT NULL,
  `Titulo` text NOT NULL,
  `Evangelio` text NOT NULL,
  `fecha_ini` date NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evangelio`
--

INSERT INTO `evangelio` (`ID`, `Titulo`, `Evangelio`, `fecha_ini`, `Estado`) VALUES
(6, '1.1', '1.1', '2020-10-13', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Titulo` text NOT NULL,
  `Texto` text NOT NULL,
  `ImgName` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`ID`, `User_ID`, `Titulo`, `Texto`, `ImgName`, `Fecha`, `Estado`) VALUES
(1, 1, 'Fray Nelson pide oraciones por problemas de salud', 'El sacerdote dominico Nelson Medina, conocido como Fray Nelson, se encuentra en un hospital de Colombia donde viene recibiendo chequeos médicos de cierto cuidado, y por ello, ha pedido oraciones a todos sus amigos y seguidores.\r\n\r\nUna publicación compartida de Nelson Medina (@fraynelson) el 1 Jun, 2019 a las 7:36 PDT:\r\n”Amigos, les comparto que me encuentro en unos chequeos médicos de cierto cuidado y trascendencia”, comentó Fray Nelson a través de su cuenta de Instagram el 1 de junio desde una de las sedes de la Fundación Santa Fe de Bogotá, donde deberá pasar algunos días.\r\n\r\nEl sacerdote explicó que, por motivo de la revisión médica, no podrá publicar con la frecuencia como le gusta hacerlo.\r\n“Gracias por su amistad, y me encomiendo a sus oraciones” concluyó Fray Nelson en su mensaje.\r\n\r\nEn otro mensaje compartido el domingo 2 de junio, Fray Nelson envió un agradecimiento a todos los que hacen sentir su presencia y sobre todo sus oraciones.\r\n\r\n“Dios les pague”, dijo el presbítero dominico.\r\n\r\nHasta el momento, el sacerdote ha recibido miles de comentarios de apoyo en Twitter e Instagram.', 'noticia-1.jpg', '2020-07-10', 1),
(2, 1, 'Rueda de prensa del Papa Francisco en el vuelo de regreso de Rumanía', 'Rueda de prensa del Papa Francisco en el vuelo de regreso de Rumaní­a, este domingo, durante el vuelo que lo llevó de Rumanía a Roma, el Papa Francisco concedió una rueda de prensa en la que abordó el ecumenismo, relató cómo ha visto a Benedicto XVI y llamó a Europa a retomar el sueño de los padres fundadores de la Unión Europea.\r\n\r\nA continuación el texto completo de la conferencia de prensa:\r\n\r\nAlessandro Gisotti (Director de la Sala de Prensa de la Santa Sede):\r\n\r\nBuenas noches, bienvenido Santo Padre. Vuelo de regreso: el lema de este viaje era “caminos juntos”, pero también volamos juntos porque pienso que hemos volado siempre tanto, también el compromiso, el cansancio. En la discurso a la prensa extranjera hace pocos días concluí­a diciendo “veo en los viajes apostólicos su cansancio, el cansancio, la fatiga, el compromiso de los colegas que ha relatado este viaje, hoy en la jornada de las comunicaciones sociales, obviamente como saben con el tema …” . santo Padre, sé que quiere, antes de las preguntas, ofrecer alguna reflexión sobre esta jornada a nosotros dedicada.\r\n\r\nPapa Francisco:\r\n\r\nBuenas noches. Muchas gracias a su compañía y como dijo Gisotti, hoy esta jornada llama a ustedes, llama nuestro pensamiento a ustedes. Ustedes trabajan en las comunicaciones, son operadores como dijo Alessandro, pero antes de todo ustedes son, deberían ser, testimonios de la comunicación. Hoy la comunicación va en retroceso, en general, va adelante el contacto, hacer los contactos y no llegar a comunicar. Y ustedes por vocación son testimonios en el comunicar. Es verdad, deben de hacer los contactos, pero no detenerse ahí­. Los aliento a ir adelante en este testimonio de comunicar. Este tiempo tiene menos necesidad de contactos y más de comunicación. Gracias, felicidades por su jornada y adelante con las preguntas.\r\n\r\nDiana Dumitrascu (TVR):\r\n\r\nSanto Padre, le agradezco su visita a Rumanía. Santidad, usted sabe que millones de nuestros connacionales han emigrado en los últimos años. ¿Cuál será su mensaje para una familia que deja a sus propios hijos ir a trabajar al extranjero con el objetivo de asegurar un futuro mejor?\r\n\r\nPapa Francisco:\r\n\r\nEsto me hace pensar en el amor de la familia, porque partirse en dos y tres no es una cosa bella. Siempre está la nostalgia por el reencuentro, pero partirse porque no falte nada a la familia es un acto de amor. En la Misa de ayer hemos escuchado la última petición de aquella señora que trabajaba en el extranjero para ayudar a la familia. Siempre un desplazamiento así­ es doloroso. ¿Por qué se van? No para hacer turismo, por necesidad. Tantas veces no es porque en el paí­s no encuentren...tantas veces son resultado de una polí­tica mundial que incide en esto. Sé en la historia de tu país después de la caída del comunismo, y después tantas, tantas empresas extranjeras han cerrado para abrir en el extranjero y ganar más. Cerrar hoy una empresa es dejar a la gente en la calle y esta es una injusticia mundial, general, de falta de solidaridad. Es un sufrimiento.\r\n\r\n¿Cómo luchar? Buscando abrir fuentes de trabajo. No es fácil, no es fácil en la situación mundial de las finanzas y de la economí­a. Pero piensen que tienen un nivel de natalidad impresionante, aquí­ no se ve el invierno demográfico que se ve en Europa. Es una injusticia no poder tener fuentes de trabajo para tantos jóvenes. Por eso deseo que se resuelva esta situación que no depende solo de Rumaní­a, sino del orden mundial financiero, de esta sociedad del consumismo, del tener más, del ganar más, y tanta gente queda sola. Esta es mi respuesta, un apelo a la solidaridad mundial en este momento que Rumanía tiene la presidencia (rotaria de la Unión Europea Ndr).\r\n\r\nCristian Micaci (Radio María Rumaní­a de idioma húngaro) :\r\n\r\nSanto Padre, como dijo el director antes, se ha hablado tanto de caminar juntos. Ahora a su partida que nos aconseja a nosotros en Rumaní­a, cuáles deberí­an ser las relaciones entre las confesiones, en particular entre la Iglesia Católica y Ortodoxa, entre la minoría católica y la mayoría ortodoxa, la relación entre las varias etnias, la relación entre el mundo político y sociedad civil?.\r\n\r\nPapa Francisco:\r\n\r\n\r\nUna relación en general yo dirí­a. La relación de la mano extendida cuando hay conflictos. Hoy un paí­s en desarrollo con alto nivel de natalidad como ustedes, no puede darse el lujo de tener enemigos dentro.\r\n\r\nSe debe hacer un proceso de acercamiento, siempre. Diversas etnias, diversas confesiones religiosas, sobre todo las dos cristianas. Esto es lo primero: siempre la mano extendida, la escucha del otro. Con los ortodoxos, ustedes tienen un gran patriarca, un hombre de gran corazón y un gran estudioso. Conoce la mística de los padres del desierto, la mí­stica espiritual, estudió en Alemania, y también un hombre de oración. Es fácil acercarse a Daniel, es fácil, porque lo siento hermano, y hemos hablado como hermanos, y no diré más porque ustedes el lunes dirán... Caminemos juntos teniendo siempre esta idea: el ecumenismo no es llegar al final del partido, de la discusión. El ecumenismo se hace caminando juntos, rezando juntos; el ecumenismo de la oración.\r\n\r\nTenemos el ecumenismo de la sangre. Cuando asesinaban a los cristianos no preguntaban: ¿Tú eres ortodoxo?, ¿tú eres católico?, ¿tú eres luterano?, ¿tú eres anglicano? No, tú eres cristiano. La sangre se mezclaba.\r\n\r\nUn ecumenismo del testimonio, de la oración, de la sangre, el ecumenismo del pobre que es trabajar juntos. Eso: debemos trabajar para ayudar a los enfermos, a los marginados, ayudar. Mateo 25 es un bello programa ecuménico. Caminar juntos es ya una unidad de los cristianos, pero no esperen que los teólogos se pongan de acuerdo para llegar a la Eucaristía. La Eucaristí­a se hace todos los días con la oración, con la memoria de la sangre de nuestros mártires, con las obras de caridad y deseándose el bien.\r\n\r\nEn una ciudad de Europa hay una relación entre el arzobispo católico y el arzobispo luterano. El arzobispo católico debía estar en el Vaticano el domingo en la noche, me ha llamado que llegarí­a el lunes en la mañana. Cuando ha llegado me dijo: Discúlpame, ayer el arzobispo luterano ha debido irse a una reunión de ellos y me ha pedido “ven por favor a mi catedral y haz tú el culto”. Existe la fraternidad, llegar a esto es tanto, ¿no? Y la hizo el católico. No hizo la EucaristÃ­a, pero sí la predicación.\r\n\r\nCuando yo en Buenos Aires he sido invitado por la Iglesia escocesa a hacer prédicas, iba y hací­a la prédica. Se puede caminar juntos. Unidad, fraternidad, mano extendida, mirarse bien, hablar mal de los demás. Defectos tenemos todos, si caminamos juntos, todos los defectos los dejamos de lado.\r\n\r\nXavier de Normand (medios franceses):\r\n\r\nSantidad, mi pregunta tiene que ver con la primera. El primer dí­a de este viaje usted fue a la catedral ortodoxa para este momento bello pero también un poco duro de la oración del Padrenuestro. Un poco duro porque católicos y ortodoxos estaban juntos, pero no han rezado juntos. Usted ha hablado del ecumenismo de la oración. Mi pregunta es: Santidad, ¿qué ha pensado usted cuando ha permanecido en silencio durante la oración del Padrenuestro en rumano?, y ¿cuáles son los próximos pasos concretos en este caminar juntos?\r\n\r\nPapa Francisco:\r\n\r\nHago una confidencia. No he permanecido en silencio, he rezado el Padrenuestro en italiano y he visto durante la prédica del Padrenuestro, la mayoría de la gente sea en rumano, sea en latín, rezaba. La gente va más allá de nosotros las cabezas. Nosotros los jefes debemos hacer los equilibrios diplomáticos para asegurar que caminamos juntos, hay hábitos, reglas diplomáticas que es bueno mantener para que las cosas no se arruinen. Pero cada pueblo reza junto, también nosotros cuando estamos solos rezamos juntos. Este es un testimonio, y tengo una experiencia de oración con tantos pastores, luteranos, evangélicos, también ortodoxos. Los patriarcas están abiertos, también nosotros los católicos tenemos gente cerrada que no quiere, que dice que los ortodoxos son cismáticos. Son cosas viejas. Los ortodoxos son cristianos. Hay grupos católicos un poco integristas. Debemos tolerarlos, rezar por ellos, porque el Señor con el Espí­ritu Santo ablande. Pero yo he rezado los dos, no he mirado a Daniel pero creo que él también lo mismo.\r\n\r\nManuela Tulli (Ansa):\r\n\r\nHemos estado en Rumanía, país que se mostró europeí­sta. En estas elecciones algunos líderes como nuestro vicepremier Matteo Salvino han hecho campaña política mostrando sí­mbolos religiosos. ¿Qué impresión le ha dado esto?, y si ¿es cierto que usted no quiere encontrar a nuestro vicepremier?\r\n\r\nPapa Francisco:\r\n\r\nComienzo con la segunda (pregunta). Yo no he escuchado que nadie del gobierno, excepto el premier, haya pedido audiencia, nadie. Porque para una audiencia se debe hablar a la Secretaría de Estado. El premier Conte la ha pedido, fue dada como indica el protocolo. Fue una bella audiencia con el premier, de una hora o más quizás, un hombre inteligente, un profesor que sabe de qué cosa habla.\r\n\r\nSegundo: del vicepremier no he recibido nada, y de los demás ministros tampoco. Sí, al presidente de la República lo he recibido.\r\n\r\nSobre las imágenes: he confesado tantas veces que de los periódicos leo dos: el diario del partido, que es Osservatore Romano. Sería bello que ustedes lo leyesen porque encontrarí­an interpretaciones muy interesantes, y cosas que digo también están ahí­. El periódico del partido y después Il Messaggero que me gusta porque tiene los tí­tulos grandes y lo hojeo así, algunas veces me detengo ahí; y no he entrado en estas noticias de las propagandas, cómo ha hecho un partido la propaganda electoral, de verdad.\r\n\r\nHay un tercer elemento. En esto me confieso ignorante: yo no comprendo la política italiana y de verdad debo estudiarla, entonces, decir una opinión sobre el comportamiento de una campaña electoral, de uno de los partidos, sin una información así, serí­a muy imprudente de mi parte. Yo rezo por todos, porque Italia vaya adelante, para que los italianos se unan y sean leales en el compromiso, también yo soy italiano porque soy hijo de un inmigrante italiano, de sangre soy italiano. Mis hermanos tienen todos la ciudadaní­a, yo no he querido tenerla porque en el tiempo que la han concedido yo era obispo y he dicho que el obispo debe ser de la patria.\r\n\r\nHay en la política de tantos países la enfermedad de la corrupción. Por todos lados. No digan mañana que el Papa ha dicho que la polí­tica italiana es corrupta. No. Yo he dicho que una de las enfermedades de la polí­tica, por todas partes, es caer en la corrupción. Por favor, no me hagan decir lo que no he dicho. Una vez me han dicho cómo son los pactos polí­ticos. Figúrate una reunión de nueve empresarios, a la mesa; discuten para ponerse de acuerdo sobre el desarrollo de su empresa, al final después de horas, horas, café, café, café, se ponen de acuerdo, han tomado la palabra, hacen el asunto, agradecen, œde acuerdo, de acuerdo; mientras lo hacen imprimir, toman un whisky para festejar, y después, comienzan a girar los papeles para firmar el acuerdo. En el momento que giran los papeles, bajo la mesa, le hago otro bajo la mesa. Esto es corrupción polí­tica. Que se hace un poco por todas partes. Debemos ayudar a los políticos a ser honestos, a no hacer campaña con banderas deshonestas, la calumnia, la difamación, los escándalos; y tantas veces sembrar odio y miedo.\r\n\r\nEsto es terrible, un polí­tico nunca debe sembrar odio y miedo, solo esperanza. Justa, exigente, pero esperanza, porque debe conducir al país ahí­, y no darle miedo.\r\n\r\nEva Fernández (COPE):\r\n\r\nSanto Padre, ayer en el encuentro con los jóvenes y las familias ha insistido de nuevo en la importancia de la relación entre los abuelos y los jóvenes a fin que los jóvenes tengan raíces para ir hacia adelante y los abuelos puedan soñar. Usted no tiene una familia cercana, pero ha dicho que Benedicto XVI es como tener un abuelo en casa. ¿Aún lo ve así?\r\n\r\nPapa Francisco:\r\n\r\nY más. Cada vez que voy donde él a visitarlo lo siento así, le tomo la mano y le hago hablar. Habla poco, habla despacio, pero con la misma profundidad de siempre, porque el problema de Benedicto son las rodillas, no la cabeza. Tiene una gran lucidez. Y sintiéndolo hablar me vuelvo fuerte, siento el zumo de las raí­ces que me vienen y me ayudar a seguir adelante. Siento esta tradición de la Iglesia que no es una cosa de museo la tradición. La tradición es la raíz que te dan el zumo para crecer, y tú no serás como la raí­z, no; tú florecerás, el árbol crecerá y dará los frutos, y las semillas serán las raí­ces para los demás. La tradición de la Iglesia está siempre en movimiento.\r\n\r\n\r\nEn una entrevista que ha hecho Andrea Monda en “Osservatore Romano” ustedes leen Osservatore, ¿no? hace unos dÃ­as, había una situación que me ha gustado tanto, del músico Gustav Mahler, y hablando de la tradición, él decí­a: la tradición es la garantí­a del futuro y no la custodia de las cenizas. No es un museo. La tradición no custodia las cenizas. La nostalgia de los integristas: regresar a las cenizas. No, las tradiciones son raíces que garantizan que el árbol crezca, florezca y dé fruto; y repito esa pieza del poeta argentino (Francisco Luis Bernárdez, Ndr) que me gusta tanto: todo lo que el árbol tiene de florido, vive de lo sepultado.\r\n\r\nEstoy contento porque en Iasi hice referencia a esa abuela que ha tenido un gesto de complicidad y que con los ojos, en aquel momento he estado tan emocionado que no he reaccionado, y después el papamóvil ha seguido adelante y habrí­a podido decir a esta abuela que venga para hacer ver este gesto, y he dicho al Señor Jesús: es una pena, pero tú eres capaz de resolver, y nuestro bravo Francisco cuando ha visto la comunicación que he tenido con aquella mujer con los ojos, ha tomado la fotografí­a y hecho pública. La he visto esta tarde en Vatican Insider. Estas son las raíces. Y esto crecerá, no será como yo, pero yo doy lo mío. Es importante este encuentro.\r\n\r\nDespués están los verbos, cuando los abuelos sienten de tener nietos que llevarán adelante la historia, comienzan a soñar; y los abuelos cuando no sueñan se deprimen. Existe el futuro y los jóvenes animados comienzan a profetizar.\r\n\r\nLucas Wiegelmann (Herder Correspondenz):\r\n\r\nSanto Padre en estos días ha hablado tanto de la fraternidad y de la gente y del caminar juntos, como hemos ya escuchado, pero vemos que en Europa crece el número de los que no desean la fraternidad, sino el egoí­smo y el aislamiento, y prefieren caminar solos. ¿Por qué es así­?, y ¿qué debe hacer Europa para cambiarlo?\r\n\r\nPapa Francisco:\r\n\r\nDiscúlpame si me cito, pero lo hago sin vanidad, por utilidad. Hablé de este problema en los dos discursos en Estrasburgo: en el discurso que he dado cuando recibí el Premio Carlo Magno y después en el discurso que di a todos los jefes de Estado y de gobierno en la Capilla Sixtina en el aniversario de los pactos, en la fundación de la Unión Europea.\r\n\r\nEn estos discursos he dicho todo lo que pienso, y también hay un quinto discurso que no lo he dado yo, sino el alcalde Bugermeister de Aachen. Este es una joya, una joya suya de los alemanes.\r\n\r\nEuropa debe coloquiar, no debe decir “pero somos unidos, ahora dile a Bruselas arreglense ustedes.\r\n\r\nTodos somos responsables de la Unión Europea y esta circulación de la presidencia no es un gesto de cortesí­a como bailar el minueto: te toca a ti, te toca a ti. No, es un símbolo de la responsabilidad que cada uno de los países tiene sobre Europa. Si Europa no mira bien los retos futuros, Europa se desvanecerá, será desvanecida. Me permití decir en Estrasburgo que siento que Europa está dejando de ser la madre Europa; se está convirtiendo la “abuela Europa”. Se ha envejecido, ha perdido la ilusión de trabajar juntos. Quizás a escondidas alguno se puede hacer la pregunta: ¿no será este el fin de una aventura de 60 años?\r\n\r\nRetomar la mí­stica de los padres fundadores. Retomar esto. Europa tiene necesidad de sí­ misma, de ser ella misma, de la identidad propia, de la propia unidad; y superar con esto, con tantas cosas que la buena política ofrece, las divisiones y las fronteras. Estamos viendo las fronteras en Europa. Esto no hace bien, al menos las fronteras culturas, no hacen bien. Es verdad que el paí­s tiene su propia cultura y debe cuidarla, pero con la mÃ­stica del poliedro. Hay una globalización donde se respeta la cultura de todos, pero todos unidos.\r\n\r\nPor favor, que Europa no se deje vencer por el pesimismo o las ideologías, porque Europa es atacada no con cañones o bombas en este momento, sí con ideologí­as, ideologí­as que no son europeas, que vienen de afuera, o crecen en los grupitos de Europa, que no son grandes. Piensen en la Europa dividida y beligerante del 14 y del 32, 33, hasta el 39, que ha estallado la guerra. No regresemos a esto por favor. Aprendamos de la historia, no caigamos en el mismo hueco. La otra vez les he dicho que se dice que el único animal que cae dos veces en el mismo hueco es el hombre. El asno nunca lo hace. Pero lee el discurso de Bugermeister, una joya.\r\n\r\nGisotti:\r\n\r\nGracias Santo Padre, gracias por esta disponibilidad al término de tres dí­as así ocupados, también para estos cinco viajes, uno después del otro en esta primera parte del año, ricos de momentos.\r\n\r\nPapa Francisco:\r\n\r\nAhora dos cosas, por motivos del clima debí­ ir ayer en auto dos horas y cuarenta. Fue una gracia de Dios, he visto un paisaje bellí­simo como nunca había visto. He cruzado toda Transilvania.\r\n\r\nHoy para ir a Blaj, lo mismo. Una cosa bella. El paisaje de este paí­s, agradezco también la lluvia que me ha hecho viajar así­ y no en helicóptero. Tener más contacto con la realidad.\r\n\r\nLa segunda cosa: sé que algunos de ustedes son creyentes, otros no tanto, pero diré a los creyentes: recen por Europa, recen por Europa, el Señor nos dio la gracia. A los no creyentes deseen la buena voluntad, el deseo de corazón para que Europa regrese a ser el sueño de los padres fundadores.', 'noticia-2.jpg', '2020-07-10', 1),
(3, 1, 'Taxista es despedido por negarse a llevar a una mujer embarazada a clínica abortiva', 'Este hombre fue despedido de inmediato cuando sus superiores se enteraron del caso, la muchacha justificó su acción diciendo a través de redes sociales que no estaba en condiciones de cuidar a un niño, «Tengo 20 años y descubrí­ que estaba embarazada y luego decidí que querí­a un aborto porque no estoy en condiciones de cuidar a un niño», escribió en Reddit.', '', '2020-07-21', 1),
(4, 1, 'Conmovedoras palabras de Julio Melgar antes de morir', 'Tuve el privilegio de poder cuidarlo los últimos 18 dí­as de su vida. Tuve el privilegio del cielo de oí­rlo profetizarle a la gente que llegaba a verlo y salía la gente llorando de ahí. Tuve el privilegio de verlo los últimos 15 minutos conscientes de este hombre, pero ¿sabe qué hizo? le profetizó a un pastor que acababa de aterrizar en Estados Unidos y que me dijo que ya estaba ahí. Le profetizó a él y a su esposa y ellos lloraban, luego me dijo pásame a mi cama, lo pasamos con el pastor y lo acostamos y fue lo último que se supo consciente de nuestro amado Julio dijo el pastor a la audiencia en el funeral.', '', '2020-07-21', 1),
(5, 1, '“La angustia de no poder respirar hizo que le pidiera a Dios morir”, locutor Chobeto Salguero acepta que por momentos pensó que no lograría vencer el virus', 'Luego de un mes y medio fuera de circulación, Roberto Salguero, conocido como Chobeto, regresó este martes a la cabina de radio Femenina luego de vencer el COVID-19. El virus, dice, no solo trastocó sus bolsillos sino que además transformó por completo su vida.\r\n\r\nChobeto no ha logrado hacer números de cuánto tuvo que invertir para salir adelante con la enfermedad porque decidió atenderse en casa, pero sí recuerda que cuando todo comenzó, en un solo día gastó $50 en medicamentos.\r\n\r\nEl locutor de 37 años y padre de dos niños, de once y 4 años, dice que comenzó con fiebres, dos días después perdió el olfato y el gusto y al final de ese fin de semana, ya no podía levantarse.\r\n\r\nDesde el inicio del confinamiento él envió sus hijos, lejos de casa. Así que fue relativamente fácil aislarse.', 'noticia-5.jpg', '2020-07-21', 1),
(6, 2, 'Douglas Gómez, el héroe salvadoreño que murió ahogado al salvar la vida de tres niños en Canadá', 'Douglas se encontraba celebrando el cumpleaños de su hija con un grupo cercano de amigos. Dio su vida tratando de rescatar a tres niños que eran arrastrados por el agua de un lago en Canadá. Era un hombre orgulloso de su tierra natal: El Salvador.', 'noticia-6.jpg', '2020-09-03', 1),
(7, 2, 'Locutor Marcos Rubio critica la nueva canción de King Flyp por “ocultar” lo negativo de El Salvador', 'A Marcos Rubio, locutor de Radio Femenina y actor de doblaje, le agradó muy poco “Mi tierra”, el reciente éxito de King Flyp. Eso se los hizo saber a sus seguidores de su cuenta de Facebook, a través de una publicación donde ofrece su opinión respecto al tema musical compuesto por Fabry “El Androide” e interpretado por el artista oriundo de Morazán.\r\n\r\nSu post lo comenzó nombrando lo que a su juicio es lo positivo de la canción.\r\n\r\n“Primero, lo positivo, para que no me tiren piedras, diciendo que no amo mi país: a pesar de los tiempos de crisis, dos artistas se unen para crear una canción, cuya letra está cargada de muchos aspectos positivos de El Salvador”, escribió el locutor.', 'noticia-7.png', '2020-09-04', 1),
(8, 2, '1', '1', '', '2020-09-04', 3),
(9, 2, '2ssdsdsdsd', '2sdsdsdsdsds', '', '2020-09-04', 3),
(10, 1, '1', '1', '', '2020-09-19', 3),
(11, 2, 'Hola', 'Mundo', '', '2020-10-24', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `ID` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Comentario` int(11) NOT NULL,
  `Respuesta` varchar(150) NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`ID`, `ID_Usuario`, `ID_Comentario`, `Respuesta`, `Fecha`, `Estado`) VALUES
(1, 1, 0, 'Muchisimas Gracias! :D', '2020-08-24', 1),
(2, 2, 0, 'Ya sabes ;)', '2020-08-24', 1),
(3, 1, 2, 'Muchas Gracias! :D', '2020-08-29', 1),
(4, 1, 3, 'Correcto!', '2020-08-29', 1),
(5, 1, 1, 'Claro!', '2020-08-29', 1),
(6, 1, 4, 'Estoy de acuerdo!', '2020-08-29', 1),
(7, 1, 5, 'Si, muy lamentable.', '2020-08-29', 1),
(8, 2, 1, '¡Increíble!', '2020-08-29', 1),
(9, 1, 7, 'y', '2020-09-06', 0),
(10, 1, 8, '2', '2020-09-06', 1),
(11, 1, 9, '3', '2020-09-06', 0),
(12, 4, 9, '3', '2020-09-08', 0),
(13, 1, 0, 'Hola', '2020-09-19', 0),
(14, 1, 12, 'el gran rey', '2020-10-24', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `ID` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `ext` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`ID`, `position`, `ext`) VALUES
(1, 2, 'jpg'),
(2, 3, 'jpg'),
(22, 1, 'PNG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Seed` varchar(100) NOT NULL,
  `Type` int(11) NOT NULL,
  `Verificado` int(11) NOT NULL,
  `SeedEmail` varchar(300) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Email`, `Password`, `Seed`, `Type`, `Verificado`, `SeedEmail`, `Estado`) VALUES
(1, 'José Manuel', 'kacaroto5677@gmail.com', '520a723f9edbafd577adf02cced96acd5dc537e6c4e43e9ef6fd4e6330e5c64b7164069f2b5bbff075774be1c8147b623994058a519642d76faecc6e3de8142c', '55fa53b6042b5a02ac3b1c326d1f48d7', 1, 1, 'H5yr9ef4XVhHsIW8fqg60W3kNi3BZD4t1bXGb3I0CjVnfzbLl13YUDc9ya4LxvdZA5vTlAM2w3OvsnYzzrzCmAPE24XfBvUEqMcxKE1KKmqgR765SUm91Dyjoz3Cuksvu6rBCuvFpE8OQ8M8DOMTsS4zZZCJYezE9sfYyZFJqCAD9AThSz9YF5dmZvLyWEQMLXDxCxZ3ismyO3DTW4iSxw6p9hKXLSY7KqU7getL1WgyOpJho2YxWHqdXzggvXfFvJdYoSnAFakMN9GYlTaTzUxqE5bFxyjsAihsQg51z0Ad', 1),
(2, 'René Blanco', 'renefernando2001@gmail.com', '9ec7097dcfcc5137bf8a1850cc75fb3b5fad37bf6fe0ffb51a828274ba38209270f8214a774b25698735eafbd1e4e138f983830bc819ae1e711d9fd44f48943a', '6beabde648ca3151929db652ccf9b1f9', 2, 1, 'beQv2pYYRszI2f3Fl9L1TZzoYnYYnhkifXvdi8UNgWijXGhtBZ7PLXmAxo3GRd3ER0o77o6wQTcX1hScYkUSGuZxzoNtUkP8SKwn1VnICF9J7ZKOs4shXr0CXN1lQdoX5zKkFgpDLguJuo2WwLQfjYx3qHzP8DneUo38anAEXgvYIbybn0RScrCODuoL5sVUiDYsMGaDytWrI0FJHPQ7iVs6F5EI2sE5Vthkt1RlGjmoySyh7kLgPIoD04L5jDEgD8OovyMXGML6K5syUaT7Vm5vlCgA9UidLSqQeBqDk66K', 1),
(3, 'Carlos Rosa', 'cwrosa2@gmail.com', '18279a814a56cf1eee8c15a90408d4f995c0ee36d7c7cc2170a799bab70e5693c7a0e49c6dbd927541f2bad14058ab56b869fe3f4b5c467a4c79d7f024c97cce', 'eba610b831bde3614ef87e4ce971f5b3', 3, 1, 'mZg9C4GeJKGQU8IZTU2zwYrOxUzudakcSzBr1jnZByB1b0heGa8VBZEaIJwQMx91VVmiRXWwHCCc9MHjqzyA4IZImqfUMzLUK4ilC7m8q7JOFMHRRqXhQi2j9pDiwVylCUFyykzCxhIgaiKVumxyVrAlNyyqZbGPcT4n5WDlV1siVmGjgyM5xZJixcO7TpQpbINPsqUb1jrKfEmwxFJ47pxVr4nEkLUOmsoxkYW1PqUxHIEaX1uutl5gLZZTmsVhZgJJybt6Nf8ifnME8n1PuVp5r2lPBwHDeaDs1my3mSHK', 1),
(4, 'Carlos Fernando Villavicencio España', 'renecanadiense@gmail.com', '4d417f3b9074eb81508add1ac7c4ebadc6a096bfc0a25d957fe4d81bc8ea780622a09006294b6c344f871e87fe6c0066dff4c4e6c3eefbfba49748d4fbf43f48', '72d9c39ea484d2a65b4f6cd7e1d4757e', 3, 1, 'oqMUV6s3hRtD1AHyD6oCEN9NcRR1YcHTNfySNvUFbzovFvHL1SFc9T1hHpL5L7qkp6wBGFl9hFRUwUgT057kY22cTTH6SAFbbs2uKUlViNOteg0N0G8olMAnJchxx094MMuRxRbO3r4HoDO9oaQVfPWKgyzxCtVYl433bzFjgEbCCNtW1elDzdgnurpgxMVMQLpKMT8An0U36SIH8moe384LKVfngYvpYC0HGqCu3kCgYDNP950cjRDtE1qSmuB3llli98MsVwCte16FyMnDxH6XHiLRlCvFhVfODIw6msRz', 1),
(5, 'z', 'z', 'z', 'z', 2, 1, 'z', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `evangelio`
--
ALTER TABLE `evangelio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `evangelio`
--
ALTER TABLE `evangelio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
