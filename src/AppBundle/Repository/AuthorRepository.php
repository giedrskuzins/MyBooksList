<?php



namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class AuthorRepository extends EntityRepository
{
    public function findAuthorsByArrayIds($idsArray)
    {
        $paramsNum=0;
        $paramsArray=null;
        $searchStr=null;
        $result=null;
        foreach($idsArray as $key => $val){
            //(a.id=?1)
            $searchStr=$searchStr.'(a.id=?'.$paramsNum.') OR ';
            $paramsArray[$paramsNum]=$val;
            $paramsNum++;
        }
        
        $searchStr=rtrim($searchStr," OR ");
        
        $dql='SELECT a FROM AppBundle:Author a '
            . "WHERE (".$searchStr.") ";
        $em=$this->getEntityManager();
        $query=$em->createQuery($dql);
        
        $query->setParameters($paramsArray);
        return $result=$query->getResult();
        
    }
    
    //private function 
}