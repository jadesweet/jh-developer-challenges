<?php

namespace Jh\Shipping;
/**
 * Class ShippingDates
 * @package Jh\Shipping
 */
class ShippingDates implements ShippingDatesInterface
{
    //Added by me
    /**
     * @param \DateTime $orderDate
     * @return \DateTime
     */
    public function calculateDeliveryDate(\DateTime $orderDate)
    {
        //Get the day of the order date e.g monday
        $day = $orderDate->format('l');

        // This statement will pass 2 out of 7 tests passed, just monday and tuesday
        // See below for other if statement which get 5 out of 7 of the tests passed
        if ($day == "Monday" || "Tuesday") {

            // plus 3 to the orderdate from delivery
            $deliveryDate = $orderDate->modify('+3 days');

        } else if ($day == "Saturday" || ("Friday") || ("Thursday") || ("Wednesday")) {

            $deliveryDate = $orderDate->modify('+5 days');

        } else {
            //be sunday
            $deliveryDate = $orderDate->modify('+4 days');
        }

        // This statement will pass 5 out of 7 tests passed, all but monday and tuesday
        /*if ($day == "Sunday") {

            // plus 4 to the orderdate from delivery
            $deliveryDate = $orderDate->modify('+4 days');

        } else if ($day == "Saturday" || ("Friday") || ("Thursday") || ("Wednesday")) {

            $deliveryDate = $orderDate->modify('+5 days');

        } else {
            //be monday and tuesday
            $deliveryDate = $orderDate->modify('+3 days');
        }*/

        // Same as the if statement above, doesn't like monday or tuesday
        /*switch ($day){
            case "Sunday":
                $deliveryDate = $orderDate->modify('+4 days');
                break;
            case "Saturday" || "Friday" || "Thursday" || "Wednesday";
                $deliveryDate = $orderDate->modify('+5 days');
                break;
            case "Monday" || "Tuesday":
                $deliveryDate = $orderDate->modify('+3 days');
                break;
        }*/

        return $deliveryDate;

    }
}
