<?php
namespace MyProject;

/**
 * Using PSR-4 compliant namespace with autoload. This class extends
 * the \MySQLi class to add extra helper function(s) such as DB::select().
 *
 * Note: namespaced DB class must use \MySQLi instead of MySQLi.
 *
 * @author  Omar Mokhtar <hello@omvr.io>
 * @link    https://omvr.io
 * @since   0.1
 */
class DB extends \MySQLi
{
    private static $instance = null;

    /**
     * Establish database connection during instantiation.
     *
     * @param string $host The datbase host.
     * @param string $username The database username.
     * @param string $passwd The database password.
     * @param string $database The database name.
     * @return void
     */
    private function __construct(
        string $host = "",
        string $username = "",
        string $passwd = "",
        string $database = ""
    ) {
        self::$instance = parent::__construct($host, $username, $passwd, $database);
    }

    /**
     * Get the current instance.
     *
     * @return DB
     */
    public static function getInstance(): DB
    {
        if (self::$instance === null) {
            // If the connection isn't established yet, then do that now.
            self::$instance = new static("localhost", "root", "p455w0rD", "kftestdb");
        }

        return self::$instance;
    }

    /**
     * A simple helper method to execute SELECT query.
     *
     * @param string $table The table name.
     * @param array $columns The columns to return; empty array means all columns.
     * @param array $where The specific data to lookup in the table.
     * @return mixed
     */
    public function select(string $table, array $columns = [], array $where = [])
    {
        $columns = !empty($columns) ? implode($columns, ", ") : "*";
        $statement = "SELECT $columns FROM $table";
        
        // Process the WHERE clause
        $whereClause = "";
        if (!empty($where)) {
            $fragments = [];
            foreach ($where as $key => $value) {
                $fragments[] = "$key = $value";
            }
            $statement .= ' WHERE ' . implode(" AND ", $fragments);
        }

        return self::getInstance()->query($statement);
    }
}
