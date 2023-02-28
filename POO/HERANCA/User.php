<?php

class User extends Conn
{
    public object $conn;
    public array $formData;
    public int $id;

    public function list(): array
    {
        $this->conn = $this->connectDb(); //prepara a conexão com o banco de dados
        $sql_users = "SELECT
                        id,
                        name,
                        email
                    FROM 
                        users 
                    ORDER BY id DESC 
                    LIMIT 10";
        $result_users = $this->conn->prepare($sql_users); //prepara a query
        $result_users->execute(); //executa a query
        $retorno = $result_users->fetchAll(); //quando se trata de varios registro
        return $retorno;
    }
    public function create(): bool
    {
        $this->conn = $this->connectDb();
        $sql_user = "INSERT INTO users (name, email, created) VALUES (:name, :email, NOW())";
        $add_user = $this->conn->prepare($sql_user);
        $add_user->bindParam(':name', $this->formData['name']);
        $add_user->bindParam(':email', $this->formData['email']);
        $add_user->execute();

        if ($add_user->rowCount()) {
            return true;
        } else {
            return false;
        }
        //var_dump($this->formData);
    }
    public function view()
    {
        //var_dump($this->id);
        $this->conn = $this->connectDb();
        $sql_user = "SELECT 
                        id, 
                        name, 
                        email, 
                        created, 
                        modified 
                    FROM 
                        users
                    WHERE 
                    id = :id 
                    LIMIT 1";
        $result_user = $this->conn->prepare($sql_user); //Prepara a query para ser executada
        $result_user->bindParam(':id', $this->id); //pega o valor do atributo $id e passa para :id
        $result_user->execute(); //executa a query
        $value = $result_user->fetch(); //quando se trata de unico registro
        return $value;
    }
    public function edit()
    {
        //var_dump($this->formData);
        $this->conn = $this->connectDb();
        $sql_edit_user = "UPDATE users SET id=:id, name=:name, email=:email, modified=NOW() WHERE id=:id";
        $edit_user = $this->conn->prepare($sql_edit_user);
        $edit_user->bindParam(':id', $this->formData['id']);
        $edit_user->bindParam(':name', $this->formData['name']);
        $edit_user->bindParam(':email', $this->formData['email']);
        $edit_user->execute();

        if($edit_user->rowCount()){
            return true;
        } else {
            return false;
        }
    }

    public function delete(): bool
    {
        $this->conn = $this->connectDb();
        $sql_delete_user = "DELETE FROM users WHERE id=:id LIMIT 1";
        $delete_user = $this->conn->prepare($sql_delete_user);
        $delete_user->bindParam(':id', $this->id);
        $value = $delete_user->execute();
        
        return $value;
    }
}
