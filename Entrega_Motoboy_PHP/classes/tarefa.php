<?php

namespace Classes;

class Tarefa {
    private $id;
    private $descricao;
    private $concluida;

    public function __set($propriedade, $valor) {
        $this->$propriedade = $valor;
    }

    public function __get($propriedade) {
        return $this->$propriedade;
    }

    public function lista() {
        $bd = Bd::getConn();
        return $bd->query('SELECT * FROM tarefas')->fetchAll();
    }

    public function buscar($id) {
        $bd = Bd::getConn();
        $stm = $bd->prepare('SELECT * FROM tarefas WHERE id=:id');
        $stm->bindParam('id', $id);
        $stm->execute();
        $registro = $stm->fetch();
        if($registro) {
            $this-> id = $registro->id;
            $this->descricao = $registro->descricao;
            $this->concluida = $registro->concluida;
        }
        return $registro;
    }

    public function salvar() {
        $bd = Bd::getConn();
        if (!$this->id) {
            $stm = $bd->prepare('INSERT INTO tarefas (descricao,concluida) VALUES (:descricao,:concluida)');
        } else {
            $stm = $bd->prepare('UPDATE tarefas SET descricao=:descricao,concluida=:concluida WHERE id=:id');
            $stm->bindValue('id', $this->id);
        }

        $stm->bindValue('descricao', $this->descricao);
        $stm->bindValue('concluida', $this->concluida);
        $stm->execute();

    }
    
    public function excluir($id) {
        $bd = Bd::getConn();
        $stm = $bd->prepare('DELETE FROM tarefas WHERE id=:id');
        $stm->bindParam('id', $id);
        $stm->execute();
    }

    public function validar() {
        if(strlen($this->descricao) < 3)
            return "Descrição não informada ou inválida";
    }

}