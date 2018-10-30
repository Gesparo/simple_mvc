<?php
/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.10.2018
 * Time: 8:33
 */

namespace App\Models;


use PDO;
use PDOStatement;

class BooksModel extends Model
{
    /**
     * @var PDO
     */
    private $connection;

    public function __construct(PDO $connection)
    {
        parent::__construct();

        $this->connection = $connection;
    }

    /**
     * Get all books
     *
     * @return array
     */
    public function get(): array
    {
        $query = $this->getQuery();

        $response = $this->sendQuery($query);

        if(false === $response) {
            return [];
        }

        return $this->parseResponse($response);
    }

    private function getQuery(): string {
        return '
           SElECT 
            books.id,
            books.name,
            authors.first_name,
            authors.last_name,
            authors.middle_name
           FROM books
           INNER JOIN authors
           ON books.author_id = authors.id
        ';
    }

    private function sendQuery(string $query): PDOStatement
    {
        return $this->connection->query($query);
    }

    private function parseResponse(PDOStatement $response): array
    {
        $result = [];

        foreach ($response as $row) {
            $result[] = [
                'book_id' => $row['id'],
                'name' => $row['name'],
                'author_name' => $this->getAuthorShortName($row['last_name'], $row['first_name'], $row['middle_name']),
            ];
        }

        return $result;
    }

    private function getAuthorShortName($lastName, $firstName, $middleName): string
    {
        return implode(
            ' ',
            [
                $lastName,
                mb_substr($firstName, 0, 1, 'UTF-8') . '.',
                mb_substr($middleName, 0, 1, 'UTF-8') . '.'
            ]
        );
    }
}