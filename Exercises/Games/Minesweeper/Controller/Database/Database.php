<?php /** @noinspection DuplicatedCode */

use Model\Game;

class Database {
    static function connect() {
        return mysqli_connect(
            DatabaseCredentials::HOSTNAME,
            DatabaseCredentials::USERNAME,
            DatabaseCredentials::PASSWORD
        );
    }

    static function insertGame(Game $game): bool {
        $connection = Database::connect();
        $query = QueryList::USER_INSERT;
        $statement = mysqli_prepare($connection, $query);
        $userId = $game->getUserId();
        $progress = $game->getProgress();
        $hidden = $game->getHidden();
        $finished = $game->getFinished();

        mysqli_stmt_bind_param(
            $statement,
            'sssii',
            $userId,
            $progress,
            $hidden,
            $finished
        );

        mysqli_close($connection);

        return mysqli_stmt_execute($statement);
    }

    static function updateGame(Game $game): bool {
        $connection = Database::connect();
        $query = QueryList::GAME_UPDATE;
        $statement = mysqli_prepare($connection, $query);
        $progress = $game->getProgress();
        $hidden = $game->getHidden();
        $finished = $game->getFinished();

        mysqli_stmt_bind_param($statement, 'ssi', $progress, $hidden, $finished);
        return mysqli_stmt_execute($statement);
    }

    static function updateUser(User $user): bool {
        $connection = Database::connect();;
        $query = QueryList::USER_UPDATE;
        $statement = mysqli_prepare($connection, $query);
        $userName = $user->getUserName();
        $email = ''; // TODO: Implement user/password system.
        $password = '';
        $gamesPlayed = $user->getGamesPlayed();
        $gamesWinned = $user->getGamesWinned();

        mysqli_stmt_bind_param($statement, 'sssii', $userName, $email, $password, $gamesPlayed, $gamesWinned);

        mysqli_close($connection);

        return mysqli_stmt_execute($statement);
    }

    static function insertUser(User $user): bool {
        $connection = Database::connect();;
        $query = QueryList::USER_INSERT;
        $statement = mysqli_prepare($connection, $query);
        $userName = $user->getUserName();
        $email = '';
        $password = '';
        $gamesPlayed = $user->getGamesPlayed();
        $gamesWinned = $user->getGamesWinned();

        mysqli_stmt_bind_param(
            $statement,
            'sssii',
            $userName,
            $email,
            $password,
            $gamesPlayed,
            $gamesWinned
        );

        mysqli_close($connection);

        return mysqli_stmt_execute($statement);
    }

    static function selectGame(int $gameId): array {
        $connection = Database::connect();
        $query = QueryList::GAME_SELECT;
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement, 'i', $gameId);
        mysqli_stmt_execute($statement);
        $rows = mysqli_stmt_get_result($statement);
        $games = [];

        while ($row = mysqli_fetch_array($rows)) {
            $games[] = new Game(
                $row['gameId'],
                $row['userId'],
                $row['progress'],
                $row['hidden'],
                $row['finished']
            );
        }

        mysqli_free_result($rows);
        mysqli_close($connection);

        return $games;
    }

    static function selectUserLastGame(string $userName): Game {
        $connection = Database::connect();
        $query = QueryList::USER_LAST_GAME_SELECT;
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement, 's', $userName);
        mysqli_stmt_execute($statement);
        $rows = mysqli_stmt_get_result($statement);
        $games = [];

        while ($row = mysqli_fetch_array($rows)) {
            $games[] = new Game(
                $row['gameId'],
                $row['userId'],
                $row['progress'],
                $row['hidden'],
                $row['finished']
            );
        }

        mysqli_free_result($rows);
        mysqli_close($connection);

        return end($games);
    }

    static function selectUser(string $userName): array {
        $connection = Database::connect();
        $query = QueryList::USER_SELECT;
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement, 's', $userName);
        mysqli_stmt_execute($statement);
        $rows = mysqli_stmt_get_result($statement);
        $users = [];

        while ($row = mysqli_fetch_array($rows)) {
            $users[] = new User(
                $row['userId'],
                $row['userName'],
                $row['email'],
                $row['password'],
                $row['gamesPlayed'],
                $row['gamesWinned']
            );
        }

        mysqli_free_result($rows);
        mysqli_close($connection);

        return $users;
    }

    static function selectAllUsers(): array {
        $connection = Database::connect();
        $query = QueryList::ALL_USER_SELECT;
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_execute($statement);
        $rows = mysqli_stmt_get_result($statement);
        $users = [];

        while ($row = mysqli_fetch_array($rows)) {
            $users[] = new User(
                $row['userId'],
                $row['userName'],
                $row['email'],
                $row['password'],
                $row['gamesPlayed'],
                $row['gamesWinned']
            );
        }

        mysqli_free_result($rows);
        mysqli_close($connection);

        return $users;
    }

    static function selectAllUserNames(): array {
        $connection = Database::connect();
        $query = QueryList::ALL_USER_SELECT;
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_execute($statement);
        $rows = mysqli_stmt_get_result($statement);
        $users = [];

        while ($row = mysqli_fetch_array($rows)) {
            $users[] = [
                'userId' => $row['userId'],
                'userName' => $row['userName']
            ];
        }

        mysqli_free_result($rows);
        mysqli_close($connection);

        return $users;
    }
}