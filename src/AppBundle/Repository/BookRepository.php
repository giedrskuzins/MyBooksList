<?php



namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class BookRepository extends EntityRepository
{
    public function getQueryfindAllOrderedByTitle()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT b FROM AppBundle:Book b '
                    . "JOIN b.genre g "
                    . 'ORDER BY b.title ASC'
            );
            //->getResult();
    }
    
    public function findBookById($id)
    {
        $parameters[0]=$id;
        $em=$this->getEntityManager();
        $query=$em->createQuery(
            'SELECT b FROM AppBundle:Book b '
            . "JOIN b.genre g "
            . "WHERE (b.id=?0) "
                    //. "ORDER BY b.title ASC"
        );
        
        $query->setParameters($parameters);
        $result=$query->getResult();
        return $result;
            //->getResult();
    }
    
    public function findBooksByTitle($title)
    {
        $parameters[0]="%".$title."%";
        $em=$this->getEntityManager();
        $query=$em->createQuery(
            'SELECT b FROM AppBundle:Book b '
            . "JOIN b.genre g "
            . "WHERE (b.title LIKE ?0) "
                    //. "ORDER BY b.title ASC"
        );
        
        $query->setParameters($parameters);
        //$result=$query->getResult();
        return $query;
            //->getResult();
    }
}