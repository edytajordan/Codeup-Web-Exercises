<?php

// __DIR__ is a *magic constant* with the directory path containing this file.
// This allows us to correctly require_once Model.php, no matter where this file is being required from.
require_once __DIR__ . '/Model.php';
require_once __DIR__.'/adlister_credentials.php';

class User extends Model
{
    /** Insert a new entry into the database */
    protected function insert()
    {
        // @TODO: Use prepared statements to ensure data security

        // @TODO: You will need to iterate through all the attributes to build the prepared query

        // @TODO: After the insert, add the id back to the attributes array
        //        so the object properly represents a DB record

        $insertData = self::$dbc->prepare('INSERT INTO users(name, email, password) VALUES (:name, :email, :password)');

       
        $insertData->bindValue(':name', $this->attributes['name'], PDO::PARAM_STR);
        $insertData->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
        $insertData->bindValue(':password', password_hash($this->attributes['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);

        $insertData->execute();

        $insertedId = self::$dbc->lastInsertId();

        $insertData = self::$dbc->prepare('SELECT * FROM users WHERE id = ?');
        $insertData->execute([$insertedId]);

    }
       
    /** Update existing entry in the database */
    protected function update()
    {
        // @TODO: Use prepared statements to ensure data security

        // @TODO: You will need to iterate through all the attributes to build the prepared query

        $updateData = self::$dbc->prepare('UPDATE users(name, email, password) VALUES (:name, :email, :password) WHERE id = :id');

       
        $updateData->bindValue(':name', $this->attributes['name'], PDO::PARAM_STR);
        $updateData->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
        $updateData->bindValue(':password', password_hash($this->attributes['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $updateData->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);

        $updateData->execute();

    }

    /**
     * Find a single record in the DB based on its id
     *
     * @param int $id id of the user entry in the database
     *
     * @return User An instance of the User class with attributes array set to values from the database
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements

        // @TODO: Store the result in a variable named $result

        $findData = self::$dbc->prepare('SELECT * FROM users WHERE id = ?');

        $findData->setFetchMode(PDO::FETCH_CLASS, 'User');

        $findData->execute([$id]);

        $result = $findData->fetch();
        var_dump($result);

        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result) {
            $instance = new static($result);
        }
        return $instance;
    }

    /**
     * Find all records in a table
     *
     * @return User[] Array of instances of the User class with attributes set to values from database
     */
    public static function all()
    {
        self::dbConnect();

        // @TODO: Learning from the find method, return all the matching records

        $allData = self::$dbc->prepare('SELECT * FROM users');
        $result = $allData->execute();
        $result = $allData->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result) {
            $instance = new static($result);
        }
        return $instance;
    }

    public static function delete($id)
    {
        self::dbConnect();
        $deleteData = self::$dbc->prepare('DELETE FROM users WHERE id = ?');
        $deleteData->execute([$id]);
        
    }
}
