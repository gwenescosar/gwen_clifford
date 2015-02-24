<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;
use Doctrine\ORM\EntityRepository;
use AppBundle\DBAL\Types\ItemTypeType;
use Gedmo\Tree\Entity\Repository\MaterializedPathRepository;

/**
 * Class CategoryRepository
 *
 * @author Artem Genvald  <genvaldartem@gmail.com>
 * @author Yuri Svatok    <svatok13@gmail.com>
 * @author Oleg Kachinsky <logansoleg@gmail.com>
 */
class CategoryRepository extends MaterializedPathRepository
{
    /**
     * Get categories
     *
     * @param int  $offset
     * @param null $limit
     *
     * @return Category[]
     */
    public function getParentCategories($offset = 0, $limit = null)
    {
        $qb = $this->createQueryBuilder('c');

        $qb
            ->where($qb->expr()->eq('c.enabled', true))
            ->andWhere($qb->expr()->isNull('c.parent'))
            ->setFirstResult($offset);

        if (null !== $limit) {
            $qb->setMaxResults($limit);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * @param int  $parentId
     * @param int  $offset
     * @param null $limit
     *
     * @return Category[]
     */
//    public function getChildrenCategories($parentId, $offset = 0, $limit = null)
//    {
//        $qb = $this->createQueryBuilder('c');
//
//        $qb
//            ->select('c.id')
//            ->addSelect('c.title')
//            ->where($qb->expr()->eq('c.enabled', true))
//            ->andWhere($qb->expr()->eq('c.parent', $parentId))
//            ->setFirstResult($offset);
//
//        if (null !== $limit) {
//            $qb->setMaxResults($limit);
//        }
//
//        return $qb->getQuery()->getArrayResult();
//    }
}
