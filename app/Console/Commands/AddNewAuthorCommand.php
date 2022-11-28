<?php

namespace App\Console\Commands;

use App\RequestSetter\AuthorRequestSetter;
use App\Services\AuthorService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class AddNewAuthorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-author';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*\n");
        $this->info("Please fill the answers all of the questions \n");
        $this->info("*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*\n");

        $firstName = $this->askValid("What's the author first name?", "First Name",  ["required","string"]);
        $lastName = $this->askValid("What's the author last name?", "Last Name",  ["required","string"]);
        $birthday = $this->askValid("What's the author birthday?", "Birthday",  ["required","string"]);
        $gender = $this->askValid("What's the author gender? ( Male/Female)", "Gender",  ["required","string"]);
        $placeOfBirth = $this->askValid("Where is the author's birthplace?", "Birth Place",  ["required","string"]);
        $biography = $this->askValid("Please enter a short biography of the author", "Biography",  ["required","string"]);
       
        $authorRequest=  new AuthorRequestSetter();

        $authorRequest->setFirstName($firstName);
        $authorRequest->setLastName($lastName);
        $authorRequest->setBirthday($birthday);
        $authorRequest->setGender($gender);
        $authorRequest->setPlaceOfBirth($placeOfBirth);
        $authorRequest->setBiography($biography);
        
        $store = (new AuthorService)->store($authorRequest->toArray());
       
        if($store) {
            $this->info("*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*\n");
            $this->info("The auhtor added successfully! ( $firstName $lastName)\n");
            $this->info("*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*\n");
        }else{
            $this->info("Something went wrong...");
        }


        return Command::SUCCESS;
    }

    protected function askValid($question, $field, $rules)
    {
        $value = $this->ask($question);

        if($message = $this->validateInput($rules, $field, $value)) {
            $this->error($message);

            return $this->askValid($question, $field, $rules);
        }

        return $value;
    }


    protected function validateInput($rules, $fieldName, $value)
    {
        $validator = Validator::make([
        $fieldName => $value
        ], [
        $fieldName => $rules
        ]);

        return $validator->fails()
            ? $validator->errors()->first($fieldName)
            : null;
    }
}
