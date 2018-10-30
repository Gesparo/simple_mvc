<?php
/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.10.2018
 * Time: 11:33
 */

namespace App\Models;


class SingleBookModel extends Model
{
    /**
     * @var \PDO
     */
    private $connection;

    /** @var int */
    private $bookId;
    /**
     * @var int
     */
    private $page;

    private const PAGE_SYMBOLS_LIMIT = 6000;

    /**
     * SingleBookModel constructor.
     * @param \PDO $connection
     * @param int $bookId
     * @param int $page
     */
    public function __construct(\PDO $connection, int $bookId, $page = 1)
    {
        parent::__construct();
        $this->connection = $connection;
        $this->bookId = $bookId;
        $this->page = $page;
    }

    /** Get first page */
    public function get(): array
    {
        $query = $this->connection->prepare('SELECT name, content FROM books WHERE id = ?');

        if(! $query->execute([$this->bookId])) {
            throw new \Exception("Can not get book from database");
        }

        $queryResult = $query->fetch();

        $result = [
            'book_id' => $this->bookId,
            'page' => $this->page,
            'name' => $queryResult['name'],
            'is_first' => $this->isPageFirst(),
            'is_last' => $this->isPageLast($queryResult['content']),
            'content' => $this->getContent($queryResult['content']),
        ];

        return $result;
    }

    private function isPageFirst(): bool
    {
        return 1 === $this->page;
    }

    private function isPageLast(string $content): bool
    {
        return ! (bool) mb_strlen(mb_substr(
            $content,
            $this->page * SingleBookModel::PAGE_SYMBOLS_LIMIT,
            SingleBookModel::PAGE_SYMBOLS_LIMIT,
            'UTF-8'
        ), 'UTF-8');
    }

    private function getContent(string $content): string
    {
        return mb_substr(
            $content,
            ($this->page - 1) * self::PAGE_SYMBOLS_LIMIT,
            self::PAGE_SYMBOLS_LIMIT,
            'UTF-8'
        );
    }
}