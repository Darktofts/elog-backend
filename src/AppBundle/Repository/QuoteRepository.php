<?php

namespace AppBundle\Repository;

use AppBundle\Form\FilterType\Model\ListFilter;
use AppBundle\Form\FilterType\Model\QuoteFilter;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * Class QuoteRepository
 * @package AppBundle\Repository
 */
class QuoteRepository extends EntityRepository
{
    /**
     * @param ListFilter $listFilterModel
     *
     * @return QueryBuilder
     */
    public function filterAndReturnQuery(QuoteFilter $listFilterModel)
    {
        $qb = $this->createQueryBuilder('q')
            ->setMaxResults(QuoteFilter::LIMIT)
        ;

        $this->applyFilter($qb, $listFilterModel);

        return $qb->getQuery();
    }

    /**
     * @param QueryBuilder $qb
     * @param ListFilter   $listFilterModel
     *
     * @return $this
     */
    public function applyFilter(QueryBuilder $qb, QuoteFilter $listFilterModel)
    {

        if ($listFilterModel->getOrderKey()) {
            $qb->orderBy(
                sprintf('q.%s', $listFilterModel->getOrderKey()),
                $listFilterModel->getOrderDirection()
            );
        }

        if($listFilterModel->getPriority())
        {
           $qb
              ->andWhere(sprintf(" q.priority LIKE '%s' ", "%".$listFilterModel->getPriority()."%"));
        }

        if($listFilterModel->getCustomer())
        {
          $qb
            ->andWhere(sprintf(" q.customer = %d ", $listFilterModel->getCustomer()));
        }

        if($listFilterModel->getStatus())
        {
            $qb
                ->andWhere(sprintf(" q.status = '%s' ", $listFilterModel->getStatus()));
        }
        if($listFilterModel->getType())
        {
            $qb
                ->andWhere(sprintf("q.type = '%s' ",$listFilterModel->getType()));
        }

        if($listFilterModel->getDescription())
        {
            $qb
                ->andWhere(sprintf("q.description LIKE '%s'","%".$listFilterModel->getDescription()."%"));
        }

    }
}