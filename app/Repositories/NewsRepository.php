<?php

namespace App\Repositories;

use App\DTO\NewsDataTransferObject;
use App\Models\News;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NewsRepository
{
    /**
     * Retrieve all news entries.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        try
        {
            return collect(News::all());
        }
        catch (ModelNotFoundException $e)
        {
            return collect(['News not found' => $e->getMessage()]);
        }
    }

    /**
     * Find a news entry by ID.
     *
     * @param int $id
     * @return Collection
     */
    public function find(int $id): Collection
    {
        try
        {
            return collect(News::findOrFail($id));
        }
        catch (ModelNotFoundException $e)
        {
            return collect(['News not found' => $e->getMessage()]);
        }
    }

    /**
     * Create a new news entry.
     *
     * @param NewsDataTransferObject $data
     * @return Collection
     */
    public function create(NewsDataTransferObject $data): Collection
    {
        try
        {
            return collect(News::create([
                'title' => $data->title,
                'text' => $data->text,
                'author' => $data->author,
            ]));
        }
        catch (\Exception $e)
        {
            return collect(['error' => 'Error creating news', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Update a news entry by ID.
     *
     * @param NewsDataTransferObject $data
     * @param int $id
     * @return Collection
     */
    public function update(NewsDataTransferObject $data, int $id): Collection
    {
        try {
            $news = News::findOrFail($id);
            $news->update([
                'title' => $data->title,
                'text' => $data->text,
                'author' => $data->author,
            ]);

            return collect($news);
        }
        catch (\Exception $e)
        {
            return collect(['error' => 'Update news error', 'message' => $e->getMessage()]);
        }
    }
    /**
     * Delete a news entry by ID.
     *
     * @param  int  $id
     * @return Collection
     */
    public function delete(int $id): Collection
    {
        try
        {
            $news = News::findOrFail($id);
            $news->delete();

            return collect(['success' => 'News deleted successfully']);
        }
        catch (\Exception | ModelNotFoundException $e)
        {
            return collect(['error' => 'Delete news error', 'message' => $e->getMessage()]);
        }
    }
}
