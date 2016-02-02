<?php
    class Database {

        private $host;
        private $user;
        private $pass;
        private $name;
        private $link;
        private $error;
        private $errno;
        private $query;
		private $sql;

        function __construct($host, $user, $pass, $name = "", $conn = 1) {
            $this -> host = $host;
            $this -> user = $user;
            $this -> pass = $pass;
            if (!empty($name)) $this -> name = $name;      
            if ($conn == 1) $this -> connect();
        }

        function __destruct() {
            @mysql_close($this->link);
        }

        public function connect() {
            if ($this -> link = mysql_connect($this -> host, $this -> user, $this -> pass)) {
                if (!empty($this -> name)) {
                    if (!mysql_select_db($this -> name)) $this -> exception("Could not connect to the database!");
                }
            } else {
                $this -> exception("Could not create database connection!");
            }
        }

        public function close() {
            @mysql_close($this->link);
        }

        public function query($sql) {
			$this->sql = $sql;
            $this->query = mysql_query($sql);
            if ($this->query) {
                return $this->query;
            } else {
                $this->exception("Could not query database!");
                return false;
            }
        }

        public function num_rows($qid) {
            if (empty($qid)) {         
                $this->exception("Could not get number of rows because no query id was supplied!");
                return false;
            } else {
                return mysql_num_rows($qid);
            }
        }
        
        public function fetch_all_json($qid) {
            $json = "";
            if (empty($qid)) {
                $this->exception("Could not fetch json because no query id was supplied!");
                return false;
            } else {
                while ($row = $this->fetch_array_assoc($qid)) {
                    $data[] = $row;
                }
                
                $json->DATA = $data;
                $json = json_encode($json); 
            }
            return $json;
        }

        public function fetch_array($qid) {
            if (empty($qid)) {
                $this->exception("Could not fetch array because no query id was supplied!");
                return false;
            } else {
                $data = mysql_fetch_array($qid);
            }
            return $data;
        }

        public function fetch_array_assoc($qid) {
            if (empty($qid)) {
                $this->exception("Could not fetch array assoc because no query id was supplied!");
                return false;
            } else {
                $data = mysql_fetch_array($qid, MYSQL_ASSOC);
            }
            return $data;
        }

        public function fetch_all_array($sql, $assoc = true) {
			$this->sql = $sql;
            $data = array();
            $qid = $this->query($sql);
            
            if ($qid) {
                if ($assoc) {
                    while ($row = $this->fetch_array_assoc($qid)) {
                        $data[] = $row;
                    }
                } else {
                    while ($row = $this->fetch_array($qid)) {
                        $data[] = $row;
                    }
                }
            } else {
                return false;
            }
            return $data;
        }
        public function fetch_csv($filename, $sql) {
			$this->sql = $sql;
            $fileName = $filename . '.csv';

            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header('Content-Description: File Transfer');
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename={$fileName}");
            header("Expires: 0");
            header("Pragma: public");

            $fh = @fopen( 'php://output', 'w' );
 
            $results = $this->fetch_all_array($sql); 

            $headerDisplayed = false;

            foreach ( $results as $data ) {
                // Add a header row if it hasn't been added yet
                if ( !$headerDisplayed ) {
                    // Use the keys from $data as the titles
                    fputcsv($fh, array_keys($data));
                    $headerDisplayed = true;
                }

                // Put the data into the stream
                fputcsv($fh, $data);
            }
            // Close the file
            fclose($fh);
            // Make sure nothing else is sent, our file is done
            exit;
        }

        public function last_id() {
            if ($id = mysql_insert_id()) {
                return $id;
            } else {
                return false;
            }
        }

        private function exception($message) {
            if ($this->link) {
                $this->error = mysql_error($this->link);
                $this->errno = mysql_errno($this->link);
            } else {
                $this->error = mysql_error();
                $this->errno = mysql_errno();
            }
            if (PHP_SAPI !== 'cli') {
            ?>

                <div class="alert-bad">
                    <div>
                        Database Error
                    </div>
                    <div>
                        Message: <?php echo $message; ?>
                    </div>
                    <?php if (strlen($this->error) > 0): ?>
                        <div>
                            <?php echo $this->error; ?>
                        </div>
                    <?php endif; ?>
                    <div>
                        Script: <?php echo @$_SERVER['REQUEST_URI']; ?>
                    </div>
                    <div>
                    	Query: <?php echo $this->sql ?>
                    </div>
                    <?php if (strlen(@$_SERVER['HTTP_REFERER']) > 0): ?>
                        <div>
                            <?php echo @$_SERVER['HTTP_REFERER']; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php
            } else {
                        echo "MYSQL ERROR: " . ((isset($this->error) && !empty($this->error)) ? $this->error:'') . "\n";
            };
        } 
    }
?>