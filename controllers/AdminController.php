<?php

require_once('../class/Usuario.php');
require_once('../model/AdminDAO.php');
require_once('../config/Connection.php');
require_once('../class/Conteudo.php');
require_once('../model/ConteudoDAO.php');
require_once('../model/NivelDAO.php');

class AdminController {

    public function pegaUsuarios() {

        $conexao = new Connection();
        $admin = new AdminDAO();

        $resultado = $admin->getAllUsers($conexao);

        if($resultado->num_rows > 0) {

            echo '<table class="table table-striped">';
            echo     '<tr>
                          <th scope="col">#</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Sobrenome</th>
                          <th scope="col">Telefone</th>
                          <th scope="col">E-mail</th>
                          <th scope="col">Edição</th>
                      </tr>';

            while($user = $resultado->fetch_assoc()) {

                $usuario = new Usuario($user['nome'], $user['sobrenome'], $user['telefone'], $user['email']);
                $usuario->setId($user['id']);

                echo  '<tr>'.
                          '<th scope="row">'.$usuario->getId().'</th>'.
                          '<td>'.$usuario->getNome().'</td>'.
                          '<td>'.$usuario->getSobrenome().'</td>'.
                          '<td>'.$usuario->getTelefone().'</td>'.
                          '<td>'.$usuario->getEmail().'</td>'.
                          '<td><a href="../view/editar.php?id='.$usuario->getId().'"> <i class="lni lni-pencil"></i> </a></td>'.
                      '</tr>';                   
            }

            echo '</table>';

        }

    }

    public function carregaUsuario($id) {

        $conexao = new Connection();
        $admin = new AdminDAO();

        $resultado = $admin->getUser($conexao, $id);

        $user = $resultado->fetch_assoc();

        $usuario = new Usuario($user['nome'], $user['sobrenome'], $user['telefone'], $user['email']);
        $usuario->setId($user['id']);
        $usuario->setAdmin($user['admin']);

        return $usuario;

    }

    public function editaUsuario(Usuario $usuario) {

        $conexao = new Connection();
        $admin = new AdminDAO();

        $resultado = $admin->updateUser($conexao, $usuario);

        if($resultado) {
            header('Location: ../view/editar.php?id='.$usuario->getId().'&msg="Usuário alterado com sucesso!"');
        }
        else {
            header('Location: ../view/editar.php?id='.$usuario->getId().'&msg="Falha ao alterar o usuário!"');
        }

    }

    public function pegaConteudos() {

        $conexao = new Connection();
        $admin = new AdminDAO();
        $conteudo = new ConteudoDAO();
        $nivelDAO = new NivelDAO();

        $resultado = $admin->getAllConteudo($conexao);

        if($resultado->num_rows > 0) {

            echo '<table class="table table-striped">';
            echo     '<tr>
                          <th scope="col">#</th>
                          <th scope="col">Titulo</th>
                          <th scope="col">Descricao</th>
                          <th scope="col">Dia</th>
                          <th scope="col">Semana</th>
                          <th scope="col">Edição</th>
                      </tr>';

            while($dado = $resultado->fetch_assoc()) {

                $resultado_nivel = $nivelDAO->consultaNivel($conexao, $dado['id_nivel']);
                $nivel = $resultado_nivel->fetch_assoc();

                $conteudo = new Conteudo();
                $conteudo->setTitulo($dado['titulo']);
                $conteudo->setSemana($dado['semana']);
                $conteudo->setDia($dado['dia']);
                $conteudo->setId($dado['id']);

                echo  '<tr>'.
                          '<th scope="row">'.$conteudo->getId().'</th>'.
                          '<td>'.$conteudo->getTitulo().'</td>'.
                          '<td>'.$nivel['nivel'].'</td>'.
                          '<td>'.$conteudo->getDia().'</td>'.
                          '<td>'.$conteudo->getSemana().'</td>'.
                          '<td><a href="../view/editar.php?id='.$conteudo->getId().'"> <i class="lni lni-pencil"></i> </a></td>'.
                      '</tr>';                   
            }

            echo '</table>';

        }

    }


}