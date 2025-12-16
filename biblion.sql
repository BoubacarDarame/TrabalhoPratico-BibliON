-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- SO do servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para biblion
CREATE DATABASE IF NOT EXISTS `biblion` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `biblion`;

-- A despejar estrutura para tabela biblion.autores
CREATE TABLE IF NOT EXISTS `autores` (
  `ID_Autor` int NOT NULL AUTO_INCREMENT,
  `NomeAutor` varchar(100) NOT NULL,
  `Bibliografia` text,
  PRIMARY KEY (`ID_Autor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.autores: ~4 rows (aproximadamente)
REPLACE INTO `autores` (`ID_Autor`, `NomeAutor`, `Bibliografia`) VALUES
	(1, 'Freida McFadden', 'Freida McFadden é a autora do momento, e os seus livros o maior fenómeno editorial dos últimos anos. Foi condecorada com o International Thriller Writers Award para «Melhor Livro Original» e ainda com o Goodreads Choice Award para «Melhor Thriller». Alcançou o estatuto de bestseller n.º 1 do The New York Times, USA Today, PUblishers Weekly, Sunday Times, Der Spiegel, entre outros.\r\nÉ autora de várias dezenas de livros, elogiados e classificados como «deslumbrantes» e «obrigatórios para todos os fãs de thrillers». Com mais de 15 milhões de exemplares vendidos, a sua obra está traduzida em mais de 40 idiomas e os direitos dos seus livros adquiridos para séries e filmes.\r\nEm Portugal, estreou-se com A Criada, obra que chegou rapidamente ao primeiro lugar das listas de livros mais vendidos. Os seus thrillers foram acolhidos pelos leitores portugueses com um entusiasmo sem precedentes.\r\nFreida é médica e especialista em lesões cerebrais. Vive com a sua família e o gato preto numa casa de três andares com vista para o oceano, com escadas que rangem a cada passo, e onde ninguém conseguiria ouvi-la se gritasse. A menos que gritasse muito alto, talvez.'),
	(2, 'Dan Brown', 'O escritor norte-americano Dan Brown nasceu em 1965 em New Hampshire, nos Estados Unidos da América, sendo filho de um professor de Matemática e de uma intérprete de música sacra. Brown estudou no liceu local e mais tarde licenciou-se na Universidade de Amherst.\r\nMudou-se para Los Angeles onde tentou fazer carreira como compositor, pianista e cantor. No entanto, este plano de vida fracassou e Dan Brown acabou por ir estudar história da arte em Sevilha, em Espanha. Entretanto, a meias com a mulher, escreveu o livro 187 Men to Avoid: A Guide for the Romantically Frustrated Woman.\r\nEm 1993 regressou a New Hampshire para se tornar professor de inglês na escola onde tinha estudado. Passados dois anos, os serviços secretos norte-americanos foram à sua escola buscar um aluno que consideravam uma ameaça nacional por ter escrito, na Internet, que era capaz de matar o presidente Bil Clinton. Dan Brown ficou tão interessado no assunto que começou a fazer pesquisas sobre a Agência Nacional de Segurança. Acabou por resultar desse interesse a escrita do seu primeiro romance Digital Fortress, que foi lançado em 1996 com algum sucesso.\r\nEra um romance baseado na violação de privacidade e em conspirações, tendo por sustentação as novas tecnologias.\r\nQuatro anos depois do seu romance de estreia, lançou Angels and Demons, seguindo-se em 2001 Deception Point. Finalmente, em Março de 2003, Dan Brown lançou no mercado norte-americano The Da Vinci Code (O Código Da Vinci), que logo no primeiro dia vendeu mais de seis mil exemplares, tendo-se tornado num dos livros mais vendidos de sempre em todo o mundo, com publicações em 42 línguas.\r\nO Código Da Vinci é um romance policial que tem como protagonista um simbologista norte-americano. Através da obra de Leonardo Da Vinci, onde encontra várias mensagens codificadas, tenta arranjar provas para desvendar um segredo com centenas de anos. No livro surgem instituições como a Opus Dei e o Priorado do Sião.\r\nA obra chegou a Portugal em 2004 e ao fim de poucos meses atingiu as onze edições. O sucesso deste livro levou a que fosse anunciada uma adaptação cinematográfica e uma sequela literária.'),
	(3, 'José Rodrigues dos Santos', 'José Rodrigues dos Santos nasceu em 1964 em Moçambique.\r\nÉ jornalista da RTP. Trabalhou na Rádio Macau e na BBC e foi colaborador permanente da CNN.\r\nCom dois doutoramentos, tirados em Lisboa e em Paris, foi professor na Universidade Nova de Lisboa durante 25 anos.\r\nComo romancista, venceu o Prémio Bertrand de Ficção, o Prémio do Clube Literário do Porto, o Prémio do Portal da Literatura, o Prix Littéraire de la Lusophonie e o Prix d’Excellence.\r\nO Sexto Sentido é o seu vigésimo sétimo romance.'),
	(4, 'Matt Haig', 'Matt Haig é natural de Sheffield, em Inglaterra, e começou a sua carreira como jornalista, tendo colaborado com conceituadas publicações britânicas. Iniciou-se na escrita de ficção em 2004 e, desde então, nunca mais parou, sendo atualmente um autor bestseller internacional de obras para adultos e para o público mais jovem, com livros publicados em mais de 30 idiomas.\r\nConsiderado pelo New York Times como «um romancista de grande talento», apresenta-nos histórias que muitas vezes fundem a realidade com a fantasia, oferecendo-nos uma escrita que o Guardian descreve como sendo «deliciosamente estranha».');

-- A despejar estrutura para tabela biblion.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `ID_Categoria` int NOT NULL AUTO_INCREMENT,
  `NomeCategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.categorias: ~3 rows (aproximadamente)
REPLACE INTO `categorias` (`ID_Categoria`, `NomeCategoria`) VALUES
	(1, 'Policial'),
	(2, 'Thriller'),
	(3, 'Romance');

-- A despejar estrutura para tabela biblion.editoras
CREATE TABLE IF NOT EXISTS `editoras` (
  `ID_Editora` int NOT NULL AUTO_INCREMENT,
  `NomeEditora` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Editora`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.editoras: ~3 rows (aproximadamente)
REPLACE INTO `editoras` (`ID_Editora`, `NomeEditora`) VALUES
	(1, 'Alma dos livros'),
	(2, 'Planeta'),
	(3, 'TopSeller');

-- A despejar estrutura para tabela biblion.livros
CREATE TABLE IF NOT EXISTS `livros` (
  `ID_Livro` int NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(100) NOT NULL,
  `Imagem` varchar(150) NOT NULL,
  `Descricao` text NOT NULL,
  `DataPublicacao` varchar(50) NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `ID_Editora` int NOT NULL,
  `ID_Autor` int NOT NULL,
  PRIMARY KEY (`ID_Livro`),
  UNIQUE KEY `ISBN` (`ISBN`),
  KEY `ID_Editora` (`ID_Editora`),
  KEY `ID_Autor` (`ID_Autor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.livros: ~4 rows (aproximadamente)
REPLACE INTO `livros` (`ID_Livro`, `Titulo`, `Imagem`, `Descricao`, `DataPublicacao`, `ISBN`, `ID_Editora`, `ID_Autor`) VALUES
	(1, 'A Criada', 'imagens/a_criada.jpg', 'Por trás de cada porta, ela consegue ver tudo.\r\n\r\n«Bem-vinda à família», diz Nina Winchester enquanto me cumprimenta com a sua mão elegante e bem cuidada. Sorrio educadamente e olho para o longo corredor de mármore.\r\n\r\nEste emprego caiu-me do céu. Talvez seja a minha última oportunidade para mudar de vida. E o melhor de tudo é que aqui ninguém sabe nada acerca do meu passado. Posso esconder-me e fingir ser aquilo que eu quiser. Infelizmente, não tardo a descobrir que os segredos dos Winchester são muito mais perigosos do que os meus…\r\n\r\nTodos os dias limpo a bela casa dos Winchester de cima a baixo, vou buscar a filha deles à escola e cozinho uma deliciosa refeição para toda a família antes de subir e comer sozinha no meu quarto minúsculo no sótão.\r\n\r\nTento ignorar a forma como Nina gera o caos só para me ver limpar. Como conta histórias inverosímeis sobre a filha. E como o seu marido, Andrew, parece cada dia mais destroçado. Quando o vejo, e àqueles belos olhos castanhos tão tristes, é difícil não me imaginar no lugar de Nina. Com o marido perfeito, a roupa chique, o carro de luxo. Um dia, experimentei um dos seus vestidos só para ver como me ficava. Mas ela percebeu... e foi aí que descobri porque é que a porta do meu quarto só trancava pelo lado de fora...\r\n\r\nSe sair desta casa, será algemada.\r\nDevia ter fugido enquanto podia. Agora, a minha oportunidade desapareceu. Agora que os polícias estão na casa e descobriram o que está no andar de cima, não há volta atrás.\r\nEstão a cerca de cinco segundos de me ler os direitos. Não sei muito bem porque não o fizeram ainda. Talvez esperem induzir-me a dizer-lhes algo que não devia.\r\nBoa sorte com isso.\r\n\r\nO polícia com o cabelo preto raiado de grisalho está sentado ao meu lado no sofá. Muda a posição do seu corpo entroncado sobre o cabedal italiano cor de caramelo queimado. Pergunto-me que tipo de sofá terá em casa. Não um, certamente, com um preço de cinco dígitos como este. Provavelmente de uma cor foleira como laranja, coberto de pelo de animais de estimação e com mais do que um rasgão nas costuras. Pergunto-me se estará a pensar no seu sofá em casa e a desejar ter um como este.Ou, mais provavelmente, está a pensar no cadáver lá em cima no sótão.', 'junho de 2023', '9789895701124', 1, 1),
	(2, 'O Segredo dos Segredos', 'imagens/o_segredo_dos_segredos.jpg', 'O mestre do thriller está de volta com um novo e extraordinário romance— uma obra-prima intensa, repleta de reviravoltas e de enigmas por decifrar, que vai entreter os leitores como só Dan Brown sabe fazer.\r\n\r\nRobert Langdon, prestigiado professor de simbologia, viaja até Praga para assistir a uma palestra inovadora de Katherine Solomon, uma cientista reconhecida no campo da noética, com quem começou recentemente um relacionamento amoroso. Katherine está prestes a publicar uma obra revolucionária, cujas explosivas revelações sobre a natureza da consciência humana ameaçam abalar séculos de crenças estabelecidas.\r\n\r\nQuando um terrível assassínio provoca o caos, Katherine desaparece sem deixar rasto e o seu manuscrito é destruído. Desesperado por encontrar a mulher que ama, Langdon embarca numa corrida contra o tempo pela mística Praga, enquanto é implacavelmente perseguido por uma poderosa organização e uma criatura assustadora saída das mais antigas lendas da cidade.\r\n\r\nDe Praga a Nova Iorque, passando por Londres, Langdon mergulha nos mundos da ciência mais avançada e da tradição histórica, navegando por um labirinto de códigos e símbolos, até finalmente desvendar uma verdade perturbadora sobre um projeto secreto que mudará para sempre a nossa visão da mente humana.', 'setembro de 2025', '9789895870769', 2, 2),
	(3, 'O Protocolo Caos', 'imagens/protocolo_caos.jpg', 'Um homem encapuzado sai do carro e abre fogo contra a multidão. Morrem dezenas de pessoas, incluindo bebés. Depois do massacre, tira a máscara e revela a sua identidade: Tomás Noronha.\r\n\r\nUm polícia na Rússia é alertado para atividades suspeitas na cave de um prédio. O que descobre irá mudar a história do país.\r\n\r\nUma família americana desfaz-se sem que perceba porquê. A tragédia arrasta-a para uma conspiração que vai dilacerar os Estados Unidos.\r\n\r\nUma médica brasileira é perseguida por tentar salvar vidas. Para a ajudar, Maria Flor tem de enfrentar a turba.\r\n\r\nUm birmanês tem na sua posse um documento comprometedor. Se quiser chegar a ele, Tomás Noronha precisa de mergulhar no inferno.\r\nA ligar todos estes episódios está uma mensagem enigmática.\r\n\r\nInspirado em factos reais, O Protocolo Caos transporta-nos ao coração da atualidade mais escaldante e mostra-nos como a Rússia e os seus cavalos de Troia no Ocidente usam as redes sociais para destruir o nosso mundo.', 'outubro de 2024', '9789897779336', 2, 3),
	(4, 'A Biblioteca da Meia-Noite', 'imagens/biblioteca_da_meia_noite.jpg', 'Se pudesse escolher a melhor vida para viver, o que farias?\r\n\r\nNo limiar entre a vida e a morte, depois de uma vida cheia de desgostos e carregada de remorsos, Nora Seed dá por si numa biblioteca onde o relógio marca sempre a meia-noite e as estantes estão repletas de livros que se estendem até perder de vista. Cada um desses livros oferece-lhe a hipótese de experimentar uma outra vida, de fazer novas escolhas, de corrigir erros, de perceber o que teria acontecido se tivesse escolhido um caminho diferente. As possibilidades são infinitas e vários horizontes se abrem à sua frente.\r\n\r\nMas será que algum desses caminhos lhe proporciona uma vida mais perfeita do que aquela que conheceu? Na altura da escolha final, Nora terá de olhar para dentro de si mesma e decidir o que de facto lhe preenche a vida e o que faz com que valha a pena vivê-la.\r\n\r\nA Biblioteca da Meia-Noite transformou-se num bestseller a nível internacional, com um milhão de livros vendidos em todo o mundo.', 'agosto de 2020', '9789895645183', 3, 4);

-- A despejar estrutura para tabela biblion.livro_autor
CREATE TABLE IF NOT EXISTS `livro_autor` (
  `ID_Livro` int NOT NULL,
  `ID_Autor` int NOT NULL,
  KEY `ID_Autor` (`ID_Autor`),
  KEY `ID_LivroAut` (`ID_Livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.livro_autor: ~4 rows (aproximadamente)
REPLACE INTO `livro_autor` (`ID_Livro`, `ID_Autor`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4);

-- A despejar estrutura para tabela biblion.livro_categoria
CREATE TABLE IF NOT EXISTS `livro_categoria` (
  `ID_Livro` int NOT NULL,
  `ID_Categoria` int NOT NULL,
  KEY `ID_LivroCat` (`ID_Livro`),
  KEY `ID_Categoria` (`ID_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.livro_categoria: ~8 rows (aproximadamente)
REPLACE INTO `livro_categoria` (`ID_Livro`, `ID_Categoria`) VALUES
	(1, 1),
	(1, 2),
	(2, 1),
	(2, 2),
	(3, 1),
	(3, 2),
	(3, 3),
	(4, 3);

-- A despejar estrutura para tabela biblion.problemas
CREATE TABLE IF NOT EXISTS `problemas` (
  `ID_Problema` int NOT NULL AUTO_INCREMENT,
  `ID_Utilizador` int DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Assunto` varchar(100) NOT NULL,
  `Descricao` text NOT NULL,
  PRIMARY KEY (`ID_Problema`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.problemas: ~2 rows (aproximadamente)
REPLACE INTO `problemas` (`ID_Problema`, `ID_Utilizador`, `Email`, `Assunto`, `Descricao`) VALUES
	(1, NULL, 'Joao@gmail.com', 'Livros', 'Não têm o formato do livro que eu preciso!!!'),
	(2, 2, 'carlos@gmail.com', 'Problema', 'Há um problema com os "x" no registar e login!! É muito confuso!');

-- A despejar estrutura para tabela biblion.utilizadores
CREATE TABLE IF NOT EXISTS `utilizadores` (
  `ID_Utilizador` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DataRegisto` datetime NOT NULL,
  `Cargo` enum('user','admin') DEFAULT 'user',
  PRIMARY KEY (`ID_Utilizador`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.utilizadores: ~2 rows (aproximadamente)
REPLACE INTO `utilizadores` (`ID_Utilizador`, `Nome`, `Email`, `Password`, `DataRegisto`, `Cargo`) VALUES
	(1, 'admin', 'admin@gmail.com', '$2y$10$2o8SsxGsUw.U/VxMUZ1RrOrKjHnSYo98HtMNhT9Cfkncr/b6Gjh1i', '2025-12-14 18:08:13', 'admin'),
	(2, 'Carlos', 'carlos@gmail.com', '$2y$10$5pBEUsjP.fnc/yGZn4VG7.43rXc5U9Dn7Nw9NwYAMpMK9cEZ1MYsO', '2025-12-14 18:41:39', 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
