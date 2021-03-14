<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

class FlightOffersSearchRequest
{
    /**
     * @var string
     */
    private string $originLocationCode;

    /**
     * @var string
     */
    private string $destinationLocationCode;

    /**
     * @var \DateTimeInterface
     */
    private \DateTimeInterface $departureDate;

    /**
     * @var \DateTimeInterface|null
     */
    private ?\DateTimeInterface $returnDate = null;

    /**
     * @var int
     */
    private int $adults = 1;

    /**
     * @var int
     */
    private int $children = 0;

    /**
     * @var int
     */
    private int $infants = 0;

    /**
     * TODO implement support for enum.
     *
     * @var string|null
     */
    private ?string $travelClass = null;

    /**
     * @var array<string>
     */
    private array $includedAirlineCodes = [];

    /**
     * @var array<string>
     */
    private array $excludedAirlineCodes = [];

    /**
     * @var bool
     */
    private bool $nonStop = false;

    /**
     * @var string
     */
    private string $currencyCode = 'EUR';

    /**
     * @var int|null
     */
    private ?int $maxPrice = null;

    /**
     * @var int
     * @Getter
     * @Setter
     */
    private int $max = 250;

    /**
     * @param string $originLocationCode
     * @param string $destinationLocationCode
     * @param \DateTimeInterface $departureDate
     */
    public function __construct(
        string $originLocationCode,
        string $destinationLocationCode,
        \DateTimeInterface $departureDate
    ) {
        $this->originLocationCode = $originLocationCode;
        $this->destinationLocationCode = $destinationLocationCode;
        $this->departureDate = $departureDate;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $optionalArguments = [];

        $returnDate = $this->getReturnDate();
        if ($returnDate) {
            $optionalArguments['returnDate'] = $returnDate->format('Y-m-d');
        }

        if ($this->getTravelClass()) {
            $optionalArguments['travelClass'] = $this->getTravelClass();
        }

        if ($this->getIncludedAirlineCodes()) {
            $optionalArguments['includedAirlineCodes'] = \implode(',', $this->getIncludedAirlineCodes());
        }

        if ($this->getExcludedAirlineCodes()) {
            $optionalArguments['excludedAirlineCodes'] = \implode(',', $this->getExcludedAirlineCodes());
        }

        if ($this->getMaxPrice()) {
            $optionalArguments['maxPrice'] = $this->getMaxPrice();
        }

        return \array_merge(
            [
                'originLocationCode' => $this->getOriginLocationCode(),
                'destinationLocationCode' => $this->getDestinationLocationCode(),
                'departureDate' => $this->getDepartureDate()->format('Y-m-d'),
                'adults' => $this->getAdults(),
                'children' => $this->getChildren(),
                'infants' => $this->getInfants(),
                'nonStop' => $this->isNonStop() ? 'true' : 'false',
                'currencyCode' => $this->getCurrencyCode(),
                'max' => $this->getMax(),
            ],
            $optionalArguments
        );
    }

    /**
     * @return string
     */
    public function getOriginLocationCode(): string
    {
        return $this->originLocationCode;
    }

    /**
     * @param string $originLocationCode
     */
    public function setOriginLocationCode(string $originLocationCode): void
    {
        $this->originLocationCode = $originLocationCode;
    }

    /**
     * @return string
     */
    public function getDestinationLocationCode(): string
    {
        return $this->destinationLocationCode;
    }

    /**
     * @param string $destinationLocationCode
     */
    public function setDestinationLocationCode(string $destinationLocationCode): void
    {
        $this->destinationLocationCode = $destinationLocationCode;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDepartureDate(): \DateTimeInterface
    {
        return $this->departureDate;
    }

    /**
     * @param \DateTimeInterface $departureDate
     */
    public function setDepartureDate(\DateTimeInterface $departureDate): void
    {
        $this->departureDate = $departureDate;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->returnDate;
    }

    /**
     * @param \DateTimeInterface|null $returnDate
     */
    public function setReturnDate(?\DateTimeInterface $returnDate): void
    {
        $this->returnDate = $returnDate;
    }

    /**
     * @return int
     */
    public function getAdults(): int
    {
        return $this->adults;
    }

    /**
     * @param int $adults
     */
    public function setAdults(int $adults): void
    {
        $this->adults = $adults;
    }

    /**
     * @return int
     */
    public function getChildren(): int
    {
        return $this->children;
    }

    /**
     * @param int $children
     */
    public function setChildren(int $children): void
    {
        $this->children = $children;
    }

    /**
     * @return int
     */
    public function getInfants(): int
    {
        return $this->infants;
    }

    /**
     * @param int $infants
     */
    public function setInfants(int $infants): void
    {
        $this->infants = $infants;
    }

    /**
     * @return string|null
     */
    public function getTravelClass(): ?string
    {
        return $this->travelClass;
    }

    /**
     * @param string|null $travelClass
     */
    public function setTravelClass(?string $travelClass): void
    {
        $this->travelClass = $travelClass;
    }

    /**
     * @return string[]
     */
    public function getIncludedAirlineCodes(): array
    {
        return $this->includedAirlineCodes;
    }

    /**
     * @param string[] $includedAirlineCodes
     */
    public function setIncludedAirlineCodes(array $includedAirlineCodes): void
    {
        $this->includedAirlineCodes = $includedAirlineCodes;
    }

    /**
     * @return string[]
     */
    public function getExcludedAirlineCodes(): array
    {
        return $this->excludedAirlineCodes;
    }

    /**
     * @param string[] $excludedAirlineCodes
     */
    public function setExcludedAirlineCodes(array $excludedAirlineCodes): void
    {
        $this->excludedAirlineCodes = $excludedAirlineCodes;
    }

    /**
     * @return bool
     */
    public function isNonStop(): bool
    {
        return $this->nonStop;
    }

    /**
     * @param bool $nonStop
     */
    public function setNonStop(bool $nonStop): void
    {
        $this->nonStop = $nonStop;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     */
    public function setCurrencyCode(string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     */
    public function setMaxPrice(?int $maxPrice): void
    {
        $this->maxPrice = $maxPrice;
    }

    /**
     * @return int
     */
    public function getMax(): int
    {
        return $this->max;
    }

    /**
     * @param int $max
     */
    public function setMax(int $max): void
    {
        $this->max = $max;
    }
}
