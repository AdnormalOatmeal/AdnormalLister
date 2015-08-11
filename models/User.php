<?php

    require_once 'Model.php';

    class User extends Model {

        protected static $table = 'users';

        public function save()
        {
            self::dbConnect();
            // ensure attributes array contains stuff before saving
            if (isset($this->attributes)) {
                if (isset($this->attributes['id'])) {
                    $this->update();
                } else {
                    $this->insert();
                }
            }

        }

        public function update()
        {
            $query = 'UPDATE users 
                        SET 
                        user_name = :user_name,
                        PASSWORD = :PASSWORD,
                        first_name = :first_name,
                        last_name = :last_name,
                        location = :location,
                        email = :email,
                        organization = :organization
                        WHERE id = :id';
            $stmt = self::$dbc->prepare($query);
            $stmt->bindValue(':user_name', $this->attribute['user_name'], PDO::PARAM_STR);
            $stmt->bindValue(':PASSWORD', $this->attribute['PASSWORD'], PDO::PARAM_STR);
            $stmt->bindValue(':first_name', $this->attribute['first_name'], PDO::PARAM_STR);
            $stmt->bindValue(':last_name', $this->attribute['last_name'], PDO::PARAM_STR);
            $stmt->bindValue(':location', $this->attribute['location'], PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->attribute['email'], PDO::PARAM_STR);
            $stmt->bindValue(':organization', $this->attribute['organization'], PDO::PARAM_STR);
            $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);
            $stmt->execute();
        }

        public function insert()
        {
            $query = 'INSERT INTO users (user_name, PASSWORD, first_name, last_name, location, email, organization) 
                VALUES (:user_name, :PASSWORD, :first_name, :last_name, :location, :email, :organization)';
            $stmt = self::$dbc->prepare($query);
            $stmt->bindValue(':user_name', $this->attribute['user_name'], PDO::PARAM_STR);
            $stmt->bindValue(':PASSWORD', $this->attribute['PASSWORD'], PDO::PARAM_STR);
            $stmt->bindValue(':first_name', $this->attribute['first_name'], PDO::PARAM_STR);
            $stmt->bindValue(':last_name', $this->attribute['last_name'], PDO::PARAM_STR);
            $stmt->bindValue(':location', $this->attribute['location'], PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->attribute['email'], PDO::PARAM_STR);
            $stmt->bindValue(':organization', $this->attribute['organization'], PDO::PARAM_STR);
            $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);
            $stmt->execute();
        }

        public function delete()
        {
            $query = 'DELETE FROM users
            WHERE id = :id';
            $stmt = self::$dbc->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        
        public static function find($id)
        {
            self::dbConnect();
            $query = 'SELECT * FROM users WHERE id = :id';
            $stmt = self::$dbc->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $instance = null;
            if ($result) {
                $instance = new static;
                $instance->attributes = $result;
            }
            return $instance;
        }

        // Get all rows from the users table
        public static function all()
        {
            // Connect to the DB
            self::dbConnect();

            // Get all rows
            $stmt = self::$dbc->query('SELECT * FROM users');

            // Assign results to a variable
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $instance = null;
            if ($result) {
                $instance = new static;
                $instance->attributes = $result;
            }
            return $instance;
        }

    }
