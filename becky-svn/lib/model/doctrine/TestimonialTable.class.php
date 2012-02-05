<?php

/**
 * TestimonialTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TestimonialTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TestimonialTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Testimonial');
    }

    /**
     * function getTestimonials($limit="")
     * -----------------------------------
     * fetch the testmonials
     * 
     * @param int $limit
     * @return DoctrineCollection of Testimonials / boolean no testimonials
     */
	public static function getTestimonials($limit="")
	{
        // build the DQL
		$q = Doctrine_Core::getTable('Testimonial')->createQuery('t');
		$q->addWhere('t.live=1');
		$q->orderBy('t.display_order DESC');

		// add the limit filter if need be
		if($limit!=""){
			$q->limit($limit);			
		}

        // execute the DQL
		$testimonials = $q->execute();

        // if we have testimonials return them otherwise return false
		if($testimonials->count()>0) {
			return $testimonials;
		} else {
			return false;
		}				
	}
}