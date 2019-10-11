<?php

namespace Algolia\SearchBundle;

use Doctrine\Common\Persistence\ObjectManager;

interface SearchServiceInterface
{
    /**
     * @param string $className
     *
     * @return bool
     */
    public function isSearchable($className);

    /**
     * @return array<int, string>
     */
    public function getSearchables();

    /**
     * @return array<string, array|int|string>
     */
    public function getConfiguration();

    /**
     * Get the index name for the given `$className`.
     *
     * @param string $className
     *
     * @return string
     */
    public function searchableAs($className);

    /**
     * @param ObjectManager                   $objectManager
     * @param object|array<int, object>       $searchables
     * @param array<string, int|string|array> $requestOptions
     *
     * @return \Algolia\AlgoliaSearch\Response\AbstractResponse
     */
    public function index(ObjectManager $objectManager, $searchables, $requestOptions = []);

    /**
     * @param ObjectManager                   $objectManager
     * @param object|array<int, object>       $searchables
     * @param array<string, int|string|array> $requestOptions
     *
     * @return \Algolia\AlgoliaSearch\Response\AbstractResponse
     */
    public function remove(ObjectManager $objectManager, $searchables, $requestOptions = []);

    /**
     * @param string $className
     *
     * @return \Algolia\AlgoliaSearch\Response\AbstractResponse
     */
    public function clear($className);

    /**
     * @param string $className
     *
     * @return \Algolia\AlgoliaSearch\Response\AbstractResponse
     */
    public function delete($className);

    /**
     * @param ObjectManager                   $objectManager
     * @param string                          $className
     * @param string                          $query
     * @param array<string, int|string|array> $requestOptions
     *
     * @return array<int, object>
     *
     * @throws \Algolia\AlgoliaSearch\Exceptions\AlgoliaException
     */
    public function search(ObjectManager $objectManager, $className, $query = '', $requestOptions = []);

    /**
     * @param string                          $className
     * @param string                          $query
     * @param array<string, int|string|array> $requestOptions
     *
     * @return array<string, int|string|array>
     *
     * @throws \Algolia\AlgoliaSearch\Exceptions\AlgoliaException
     */
    public function rawSearch($className, $query = '', $requestOptions = []);

    /**
     * @param string                          $className
     * @param string                          $query
     * @param array<string, int|string|array> $requestOptions
     *
     * @return int
     *
     * @throws \Algolia\AlgoliaSearch\Exceptions\AlgoliaException
     */
    public function count($className, $query = '', $requestOptions = []);
}
