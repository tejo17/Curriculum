<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();
        
        //$this->call(ProvinceSeeder::class);
        //$this->call(CitySeeder::class);
        //$this->call(OurUsersSeeder::class);
        //$this->call(WorkCentersSeeder::class);
        //$this->call(CyclesProfFamiliesSeeder::class);
        //$this->call(InformaticaSeeder::class);
        //$this->call(TagsSeeder::class);
        //$this->call(JobOffersSeeder::class);
        //$this->call(OfferTagsSeeder::class);
        //$this->call(TeacherProfFamiliesSeeder::class);
        //$this->call(SubjectTeachersSeeder::class);
        //$this->call(TutorsSeeder::class);
        //$this->call(StudentCyclesSeeder::class);
        //$this->call(SubcriptionsSeeder::class);
        //$this->call(SentEmailsSeeder::class);
        //$this->call(CommentsSeeder::class);
        //$this->call(VerifiedSeeder::class);
        //$this->call(PoblacionesSeeder::class);
        //$this->call(LanguagesSeeder::class);
        //$this->call(StudentLanguagesSeeder::class);
        //$this->call(DrivingLicensesSeeder::class);
        //$this->call(StudentDrivingLicensesSeeder::class);
        //$this->call(PersonalSitesSeeder::class);
        //$this->call(StudentPersonalSitesSeeder::class);
        //$this->call(AptitudesSeeder::class);
        //$this->call(ProfessionalExperiencesSeeder::class);
        $this->call(CertificationsSeeder::class);
    	Model::reguard();
    }
}
