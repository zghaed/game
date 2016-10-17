<?php

class Program extends DbObject {
    // name of database table
    const DB_TABLE = 'program';

    // database fields
    protected $id;
    protected $title;
    protected $code;
    protected $level;
    protected $logo_url;
    protected $creator_id;

    // constructor
    public function __construct($args = array()) {
        $defaultArgs = array(
            'id' => null,
            'title' => '',
            'code' => null,
            'level' => 0,
            'logo_url' => 'Logo_02.png',
            'creator_id' => 0
            );

        $args += $defaultArgs;

        $this->id = $args['id'];
        $this->title = $args['title'];
        $this->code = $args['code'];
        $this->level = $args['level'];
        $this->logo_url = $args['logo_url'];
        $this->creator_id = $args['creator_id'];
    }

    public function getTitle() {
      return $this->title;
    }

    public function getLevel() {
      return $this->level;
    }

    public function getId() {
      return $this->id;
    }

    public function getLogo() {
      return $this->logo_url;
    }

    public function getCode() {
      return $this->code;
    }
    // save changes to object
    public function save() {
        $db = Db::instance();
        // omit id and any timestamps
        $db_properties = array(
            'title' => $this->title,
            'code' => $this->code,
            'level' => $this->level,
            'logo_url' => $this->logo_url,
            'creator_id' => $this->creator_id
            );
        $db->store($this, __CLASS__, self::DB_TABLE, $db_properties);
    }

    // load object by ID
    public static function loadById($id) {
        $db = Db::instance();
        $obj = $db->fetchById($id, __CLASS__, self::DB_TABLE);
        return $obj;
    }

    // load all programs
    public static function getAllPrograms($limit=null) {
        $query = sprintf(" SELECT id FROM %s ORDER BY level ASC ",
            self::DB_TABLE
            );

        $db = Db::instance();

        $result = $db->lookup($query);

        if(!mysql_num_rows($result))
            return null;
        else {
            $objects = array();
            while($row = mysql_fetch_assoc($result)) {
                $objects[] = self::loadById($row['id']);
            }
            // echo '<pre>'; print_r($objects); echo '</pre>';
            return ($objects);
        }
    }

    public static function deleteById($id) {
      $query = sprintf(" DELETE FROM %s WHERE id=$id",
          self::DB_TABLE
          );

      $db = Db::instance();

      $db->lookup($query);
      header('Location: '.BASE_URL.'/programs/');
    }
}
