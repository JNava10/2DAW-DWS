<?php

class QueryList {

    const GAME_INSERT = 'INSERT INTO Games VALUES (?, ?, ?, ?)';

    const GAME_SELECT = 'SELECT * FROM Games WHERE gameId LIKE ?';

    const GAME_UPDATE = 'UPDATE Games SET progress = ?, hidden = ?, finished = ?';

    const USER_LAST_GAME_SELECT = 'SELECT * FROM Games JOIN Users ON Users.id = Games.userId WHERE Users.userName = ?';

    const USER_DELETE = 'DELETE FROM Users WHERE userName LIKE ?';

    const USER_INSERT = 'INSERT INTO Users VALUES = (?, ?, ?, ?, ?)';

    const USER_SELECT = 'SELECT * FROM Users WHERE userName LIKE ?';

    const ALL_USER_SELECT = 'SELECT * FROM Users WHERE userId LIKE ?';

    const USER_UPDATE = 'UPDATE Users SET userName = ?, email = ?, password = ?, gamesPlayed = ?, gamesWinned = ?';
}