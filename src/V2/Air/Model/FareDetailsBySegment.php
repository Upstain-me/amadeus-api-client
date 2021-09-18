<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class FareDetailsBySegment
{
    public string $segmentId = '';
    public TravelClass $cabin = TravelClass::ECONOMY;

    /**
     * Fare basis specifying the rules of a fare. Usually, though not always, is composed of the booking class code
     * followed by a set of letters and digits representing other characteristics of the ticket, such as:
     * refundability, minimum stay requirements, discounts or special promotional elements.
     */
    public string $fareBasis = '';

    /**
     * The name of the Fare Family corresponding to the fares.
     * Only for the GDS provider and if the airline has fare families filled.
     */
    public string $brandedFare = '';

    /**
     * The code of the booking class, a.k.a. class of service or Reservations/Booking Designator (RBD)
     */
    public string $class = '';

    /**
     * True if the corresponding booking class is in an allotment
     */
    public bool $isAllotment = false;

    public AllotmentDetails $allotmentDetails;

    public SliceDiceIndicator $sliceDiceIndicator = SliceDiceIndicator::LOCAL_AVAILABILITY;

    public BaggageAllowance $includedCheckedBags;

    public AdditionalServicesRequest $additionalServices;
}
