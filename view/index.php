<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TESS</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/style/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" HREF="../src/images//luneta_transparente.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <main>
        <!--cabeçalho-->
        <header>
            <a href="#" class="logo">
                <img src="../src/images/logo mapa 3 transparente.png" alt="" />
            </a>
            <h2>TESS</h2>
            <nav>
                <ul class="navbar">
                    <li><a href="#home">Início</a></li>
                    <li><a href="#aprendizado">Aprendizado</a></li>
                    <li><a href="#trilhas">Trilhas</a></li>
                    <li><a href="#sobre">Sobre</a></li>

                    <li><a href="#contato">Contato</a></li>
                </ul>
            </nav>
            <div class="header-icons">
                <?php
                    session_start(); 
                    if(isset($_SESSION['admin'])) {
                        echo '<i class="bx bx-user"><a href="../view/admin.php">'.$_SESSION['nome'].'</a></i>';
                    }
                    elseif(isset($_SESSION['email'])) {
                        echo '<i class="bx bx-user"><a href="../view/home.php">'.$_SESSION['nome'].'</a></i>';
                    }
                    else {
                        echo '<i class="bx bx-user"><a href="../view/cadastro.php" target="_blank">Cadastre-se</a></i>';
                        echo '<i class="bx bxs-log-in"><a href="../view/login.php" target="_blank">Login</a></i>';
                    }
                ?>
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>
        </header>

        <!--seção de home-->
        <section class="home" id="home">
            <div class="home-text">
                <h6>Acesse, e aprenda a falar inglês</h6>
                <h1>Inglês 100% online</h1>
                <p>Siga uma trilha de aprendizado personalizado.</p>
                <div class="latter">
                </div>
            </div>

            <div class="home-img">
                <img src="../src/images/masco_colorido2_adobe_express.png" alt="" />
            </div>
        </section>

        <!--seção container-->
        <div class="center-text" id="aprendizado">
            <h5>Aprendizado</h5>
            <h2>Oque você vai aprender?</h2>
        </div>
        <section class="container">
            <div class="container-box">
                <div class="container-imagem">
                    <img src="../src/images/gramatica.png" />
                </div>
                <div class="container-texto">
                    <h4>Gramática</h4>
                    <p>Aprenda as regras da língua inglesa</p>
                </div>
            </div>

            <div class="container-box">
                <div class="container-imagem">
                    <img src="../src/images/audicao.png" />
                </div>
                <div class="container-texto">
                    <h4>Audição</h4>
                    <p>Aprenda a identificar os sons</p>
                </div>
            </div>

            <div class="container-box">
                <div class="container-imagem">
                    <img src="../src/images/leitura.png" />
                </div>
                <div class="container-texto">
                    <h4>Leitura</h4>
                    <p>Aprenda a identificar as palavras</p>
                </div>
            </div>

            <div class="container-box">
                <div class="container-imagem">
                    <img src="../src/images/escrita.png" />
                </div>
                <div class="container-texto">
                    <h4>Escrita</h4>
                    <p>Aprenda a expressar suas ideias</p>
                </div>
            </div>
        </section>

        <!--seção trilhas-->
        <section class="trilhas" id="trilhas">
            <div class="center-text">
                <h5>Trilhas</h5>
                <h2>Trilhas Populares</h2>
            </div>

            <div class="trilhas-conteudo">
                <div class="caixa2">
                    <img src="../src/images/pipoca.png" alt="" />
                    <h3>Aprendizado com Filmes</h3>
                </div>

                <div class="caixa2">
                    <img src="../src/images/karaoke.png" alt="" />
                    <h3>Aprendizado com Música</h3>
                </div>

                <div class="caixa2">
                    <img src="../src/images/controle-de-video-game.png" alt="" />
                    <h3>Aprendizado com Jogos</h3>
                </div>

                <div class="caixa2">
                    <img src="../src/images/publicidade.png" alt="" />
                    <h3>Aprendizado com Podcast</h3>
                </div>
            </div>
        </section>

        <!--seção cursos-->
        <section class="cursos" id="cursos">
            <div class="center-text">
                <h5>Cursos</h5>
                <h2>Explore os principais cursos</h2>
            </div>
            <div class="cursos-conteudo">
                <div class="caixa">
                    <img src="../src/images/curso1.jpg" />
                    <div class="cursos-texto">
                        <h5>Trilha 1</h5>
                        <h3>Trilha Pop</h3>
                        <h6>Venha aprender inglês com seus artistas favoritos!</h6>
                    </div>
                </div>
                <div class="caixa">
                    <img src="../src/images/curso2.jpg" />
                    <div class="cursos-texto">
                        <h5>Trilha 2</h5>
                        <h3>Trilha Geek</h3>
                        <h6>Venha aprender inglês com seus filmes e séries favoritos</h6>
                    </div>
                </div>
                <div class="caixa">
                    <img src="../src/images/curso3.jpg" />
                    <div class="cursos-texto">
                        <h5>Trilha 3</h5>
                        <h3>Trilha Games</h3>
                        <h6>Venha aprender inglês com seus jogos favoritos!</h6>
                    </div>
                </div>
            </div>
        </section>

        <!--seção sobre-->
        <section class="sobre" id="sobre">
            <div class="sobre-img">
                <img src="../src/images/sobre.png" />
            </div>
            <div class="sobre-texto">
                <h2>Sobre nós</h2>
                <p>
                    A TESS é uma iniciativa que visa proporcionar uma jornada personalizada de aprendizado,
                    fundamentada em pesquisas acadêmicas e na compreensão das necessidades específicas
                    dos estudantes brasileiros.
                    Acreditamos que o domínio do inglês não deve ser um privilégio, mas sim uma ferramenta acessível a todos,
                    capacitando os estudantes a trilhar seu caminho para o sucesso por meio do conhecimento.
                </p>
                <h4>Ficou curioso?</h4>
                <h5>Crie sua conta e pratique a língua inglesa!</h5>
            </div>
        </section>

        <!--seção sobre-->
        <section class="contato" id="contato">
            <div class="contato-principal">
                <div class="contato-conteudo">
                    <img src="../src/images/logo mapa 3 transparente.png" alt="" />
                    <li><a href="mailto:tess.projeto@gmail.com">tess.projeto@gmail.com</a></li>
                    <li><a href="https://www.instagram.com/tess.projeto/profilecard/?igsh=MTE1ZGV6Ym5wcjB5Zw==">Instagram</a></li>
                </div>

                <div class="contato-conteudo">
                    <li><a href="#home">Início</a></li>
                    <li><a href="#sobre">Sobre</a></li>
                    <li><a href="#trilhas">Trilhas</a></li>
                    <li><a href="#contato">Contato</a></li>
                </div>

                <div class="contato-conteudo">
                    <li><a href="login.php" target="_blank">Login</a></li>
                    <li><a href="cadastro.php" target="_blank">Cadastre-se</a></li>
                </div>
            </div>
        </section>
        <div class="last-text">
            <p> &copy;2024 Todos os direitos reservados</p>
        </div>

        <!--javascript-->
        <script type="text/javascript" src="../src/js/script.js"></script>
    </main>
</body>

</html>