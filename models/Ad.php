<?php
    require_once '../bootstrap.php';

    class Ad extends Model {
        
        protected static $table = 'ads';

        public function save()
        {
            self:: dbConnect();

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
            $query = 'UPDATE ads
                        SET
                        title = :title,
                        price = :price,
                        sale_end_date = :sale_end_date,
                        categories = :categories,
                        description = :description
                        WHERE id = :id';

            $stmt = self::$dbc->prepare($query);

            $stmt->bindValue(':title', $this->attributes['title'], PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->attributes['price'], PDO::PARAM_INT);
            $stmt->bindValue(':sale_end_date', $this->attributes['sale_end_date'], PDO::PARAM_STR);
            $stmt->bindValue(':categories', $this->attributes['categories'], PDO::PARAM_STR);
            $stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);
            $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);

            $stmt->execute();
        }

        public function insert()
        {
            $query = 'INSERT INTO ads
                    (title, image_url, price, post_date, sale_end_date, categories, description, user_id)
                    VALUES
                    (:title, :image_url, :price, :post_date, :sale_end_date, :categories, :description, :user_id)';

            $stmt = self::$dbc->prepare($query);

            $stmt->bindValue(':title', $this->attributes['title'], PDO::PARAM_STR);
            $stmt->bindValue(':image_url', $this->attributes['image_url'], PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->attributes['price'], PDO::PARAM_INT);
            $stmt->bindValue(':post_date', $this->attributes['post_date'], PDO::PARAM_STR);
            $stmt->bindValue(':sale_end_date', $this->attributes['sale_end_date'], PDO::PARAM_STR);
            $stmt->bindValue(':categories', $this->attributes['categories'], PDO::PARAM_STR);
            $stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);
            $stmt->bindValue(':user_id', $this->attributes['user_id'], PDO::PARAM_INT);

            $stmt->execute();
        }


        public static function delete($id)
        {
            $query = 'DELETE FROM ads
                    WHERE id = :id';
            $stmt = self::$dbc->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }

        public static function find($id)
        {
            self::dbConnect();

            $query = 'SELECT * FROM ads
                    WHERE id = :id';

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

        public static function all()
        {
            self::dbConnect();

            $stmt = self::$dbc->query('SELECT * FROM ads');

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $instance = null;
            if ($result) {
                $instance = new static;
                $instance->attributes = $result;
            }
            return $instance;
        }
    }
?>