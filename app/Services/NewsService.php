<?php

namespace App\Services;

use App\DTO\NewsDataTransferObject;
use App\Repositories\NewsRepository;
use Illuminate\Support\Collection;

class NewsService
{
    /**
     * @var NewsRepository
     */
    private NewsRepository $newsRepository;

    /**
     * NewsService constructor.
     *
     * @param  NewsRepository  $newsRepository
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * Get all news entries.
     *
     * @return Collection
     */
    public function getAllNews(): Collection
    {
        return $this->newsRepository->getAll();
    }

    /**
     * Get a news entry by ID.
     *
     * @param  int  $id
     * @return Collection
     */
    public function getNewsById(int $id): Collection
    {
        return $this->newsRepository->find($id);
    }

    /**
     * Create a new news entry.
     *
     * @param  array  $data
     * @return Collection
     */
    public function createNews(array $data): Collection
    {
        return $this->newsRepository->create($this->dto($data));
    }

    /**
     * Update a news entry by ID.
     *
     * @param  array  $data
     * @param  int  $id
     * @return Collection
     */
    public function updateNews(array $data, int $id): Collection
    {
        return $this->newsRepository->update($this->dto($data), $id);
    }

    /**
     * Delete a news entry by ID.
     *
     * @param  int  $id
     * @return Collection
     */
    public function deleteNews(int $id): Collection
    {
        return $this->newsRepository->delete($id);
    }

    /**
     * Convert data array to NewsDataTransferObject.
     *
     * @param  array  $data
     * @return NewsDataTransferObject
     */
    protected function dto(array $data): NewsDataTransferObject
    {
        return new NewsDataTransferObject($data['title'], $data['text'], $data['author']);
    }
}
