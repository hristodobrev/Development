<?php

class UserLifecycle
{
    private $data;

    public function __construct()
    {
        require_once 'database.php';
        $this->data = $users;
    }

    public function getUsers()
    {
        $data = [];

        foreach ($this->data as $username => $user) {
            unset($user['password']);
            unset($user['role']);
            $user['username'] = $username;
            $data[$username] = $user;
        }

        return $data;
    }

    public function userExists(string $username) : bool
    {
        return array_key_exists($username, $this->data);
    }

    public function isAdmin(string $username) : bool
    {
        return $this->data[$username]['role'] == 'ADMIN';
    }

    public function getEmail(string $username)
    {
        return $this->data[$username]['email'];
    }

    public function getPassword(string $username)
    {
        return $this->data[$username]['password'];
    }

    public function getBirthday(string $username)
    {
        return $this->data[$username]['birthday'];
    }

    public function getFullName(string $username)
    {
        return $this->data[$username]['full_name'];
    }

    public function edit(string $username, array $data, array &$userInfo): bool
    {
        $newUser = $data['username'];
        if ($username == $newUser) {
            $this->data[$newUser] = [
                'password' => $data['password'],
                'email' => $data['email'],
                'birthday' => $data['birthday'],
                'full_name' => $this->data[$newUser]['full_name'],
                'role' => $this->data[$newUser]['role']
            ];
        } else {
            if (array_key_exists($newUser, $this->data)) {
                throw new Exception('Username already exists');
            }

            $this->data[$newUser] = [
                'password' => $data['password'],
                'email' => $data['email'],
                'birthday' => $data['birthday'],
                'full_name' => $this->data[$username]['full_name'],
                'role' => $this->data[$newUser]['role']
            ];

            unset($this->data[$username]);
            $userInfo['user'] = $newUser;
        }

        $result = $this->saveDatabase();
        return $result;
    }

    public function register(array $data)
    {
        $this->data[$data['username']] = [
            'password' => $data['password'],
            'email' => $data['email'],
            'birthday' => $data['birthday'],
            'full_name' => $data['full-name'],
            'role' => 'USER'
        ];

        $result = $this->saveDatabase();
        return $result;
    }

    public function isLogged() : bool
    {
        return isset($_SESSION['user']);
    }

    private function saveDatabase() : bool
    {
        $usersAsText = var_export($this->data, true);
        $declaration = '<?php ' . PHP_EOL . '$users = ' . $usersAsText . ';';
        $result = file_put_contents('database.php', $declaration);

        return $result !== false;
    }

    public function delete($username)
    {
        unset($this->data[$username]);
        $result = $this->saveDatabase();
        return $result;
    }

    public function promote($username)
    {
        $this->data[$username]['role'] = 'ADMIN';
        $result = $this->saveDatabase();
        return $result;
    }

    public function demote($username)
    {
        $this->data[$username]['role'] = 'USER';
        $result = $this->saveDatabase();
        return $result;
    }
}