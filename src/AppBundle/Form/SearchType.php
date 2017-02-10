<?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 12/18/2016
 * Time: 09:00
 */

namespace AppBundle\Form;

use AppBundle\Entity\EventAccidentPlace;

//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;


class SearchType  extends AbstractType
{

    //private $dateFormat="yyyy-mm-dd hh:ii";
    //private $dateFormat="yyyy-mm-dd h:i";

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$searchByDateArr=$options['searchByDateArr'];
       // $searchByStatusArr=$options['searchByStatusArr'];
        //searchByBusinessLineArr
        //$searchByBusinessLineArr=$options['searchByBusinessLineArr'];
        $builder
            ->add('searchField', null, [
                'label' => "Paieška",
                //'choices' => $searchByDateArr,
                //'choices_as_values' => true,
                'required' => false,
                //'multiple'=>true,
            ])
            ;
            /*->add('searchByDate', 'choice', [
                'label' => "Datos tipas",
                'choices' => $searchByDateArr,
                'choices_as_values' => true,
                'required' => false,
                'multiple'=>true,
            ])
                
            ->add('searchByBusinessLine', 'choice', [
                'label' => "Verslo linija",
                'choices' => $searchByBusinessLineArr,
                'choices_as_values' => true,
                'required' => false,
                'multiple'=>true,
            ])

            ->add('from_date_time', 'collot_datetime', array(
                'required' => false,
                'label' => 'Nuo',
                'pickerOptions' => array(
                    'format' => $this->dateFormat,
                    'language' => 'lt',
                )
            ))

            ->add('to_date_time', 'collot_datetime', array(
                'required' => false,
                'label' => 'Iki',
                'pickerOptions' => array(
                    'format' => $this->dateFormat,
                    'language' => 'lt',
                )
            ))
                
                
            ->add('searchByStatus', 'choice', [
                'placeholder' => "--- Pasirinkite ---",
                'label' => "Išspręstas",
                'choices' => $searchByStatusArr,
                'choices_as_values' => true,
                'required' => false,
                
                //'multiple'=>true,
            ])

            ;*/

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            //'class' => "",
            //'data_class' => null,
           // 'searchByDateArr' => null,
            //'searchByStatusArr' => null,
            //'searchByBusinessLineArr'=>null,



        ]);
    }

}