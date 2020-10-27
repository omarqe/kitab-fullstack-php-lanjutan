<?php
class DB
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
        $conn = @new mysqli($host, $username, $passwd, $database);
        if ($conn->connect_errno) {
            printf(
                '<h1>%s</h1>Error: %s',
                "Error connecting to the database.",
                $conn->connect_error
            );
            exit;
        }

        self::$instance = $conn; // Connection established
    }

    /**
     * Get the current instance.
     *
     * @return MySQLi
     */
    public static function getInstance(): MySQLi
    {
        if (self::$instance === null) {
            // If the connection isn't established yet, then do that now.
            new static("localhost", "root", "p455w0rD", "kftestdb");
        }

        return self::$instance;
    }
}
