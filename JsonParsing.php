<?php

// PHP Code to parse the JSON Object and make the corresponding variable labels for it.

class ParsingJSON {

    public function getDataFromJSON($jsonObject) {
        $formData = json_decode($jsonObject);
        return $formData;
    }

    public function getBasicDetails($jsonObject) {
        $formData = $this->getDataFromJSON($jsonObject);

        $name = $formData['name'];
        $rollNo = $formData['rollNo'];
        $gender = $formData['gender'];
        $dateOfBirth = $formData['dateOfBirth'];
        $fatherName = $formData['fatherName'];
        $motherName = $formData['motherName'];
        $fatherOccupation = $formData['fatherOccupation'];
        $motherOccupation = $formData['motherOccupation'];
        $addressCorrespondence = $formData['addressCorrespondence'];
        $addressPermanent = $formData['addressPermanent'];
        $contactPersonal = $formData['contactPersonal'];
        $contactHome = $formData['contactHome'];
        $email = $formData['email'];
        $linkedInProfile = $formData['linkedInProfile'];

        $parsedBasicDetails = array(
          "name" => $name,
          "rollNo" => $rollNo,
          "gender" => $gender,
          "dateOfBirth" => $dateOfBirth,
          "fatherName" => $fatherName,
          "motherName" => $motherName,
          "fatherOccupation" => $fatherOccupation,
          "motherOccupation" => $motherOccupation,
          "addressCorrespondence" => $addressCorrespondence,
          "addressPermanent" => $addressPermanent,
          "contactPersonal" => $contactPersonal,
          "contactHome" => $contactHome,
          "email" => $email,
          "linkedInProfile" => $linkedInProfile
        );

        return $parsedBasicDetails;
    }

    public function getAcademicDetails($jsonObject) {
        $formData = $this->getDataFromJSON($jsonObject);

        $branch = $formData['branch'];
        $spi_1 = $formData['spi_1'];
        $spi_2 = $formData['spi_2'];
        $spi_3 = $formData['spi_3'];
        $spi_4 = $formData['spi_4'];
        $spi_5 = $formData['spi_5'];
        $spi_6 = $formData['spi_6'];
        $currentCPI = $formData['currentCPI'];
        $numberOfBacklogs = $formData['numberOfBacklogs'];
        $nameOfBacklogCourses = $formData['nameOfBacklogCourses'];
        $numberOfCurrentStandingBacklogs = $formData['numberOfCurrentStandingBacklogs'];
        $nameOfCurrentBacklogCourses = $formData['nameOfCurrentBacklogCourses'];

        $parsedAcademicDetails = array(
            "branch" => $branch,
            "spi_1" => $spi_1,
            "spi_2" => $spi_2,
            "spi_3" => $spi_3,
            "spi_4" => $spi_4,
            "spi_5" => $spi_5,
            "spi_6" => $spi_6,
            "currentCPI" => $currentCPI,
            "numberOfBacklogs" => $numberOfBacklogs,
            "nameOfBacklogCourses" => $nameOfBacklogCourses,
            "numberOfCurrentStandingBacklogs" => $numberOfCurrentStandingBacklogs,
            "nameOfCurrentBacklogCourses" => $nameOfCurrentBacklogCourses
        );

        return $parsedAcademicDetails;
    }

    public function getSummerCoursesDetails($jsonObject) {
        
    }
}