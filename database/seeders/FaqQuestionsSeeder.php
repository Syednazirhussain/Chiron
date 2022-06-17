<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq_questions')->insert([
//'general', 'Trainer', 'User'

            [
                'title' => 'Simply put, how does Chirons work?',
                'description' => 'Chirons allows the user to search for personal trainers based on their location. The user can then message the personal trainer to get acquainted to make sure they are comfortable and book a time to conduct a personal training session at either the location of the personal trainer or the user (depending on trainers willingness to travel to users location). We believe that these services are more efficiently provided on a decentralized basis (ie. from ones homes) versus via facilities. This allows the services to be priced at a discount to typical facility rates while allowing trainers to earn more.  ',
                'type' => 'general',
                'status' => 'Active'
            ],
            [
                'title' => 'What is the cancellation policy?',
                'description' => 'The user will be allowed to cancel the training session up to 24 hours in advance of the booked time slot. If a cancellation occurs within 24 hours of the pre-agreed training time the user will be charged for the session. Trainers will be allowed to cancel the booking up until the time of appointment – we recommend that the trainer suggest an alternative date and time if they are to cancel. ',
                'type' => 'general',
                'status' => 'Active'
            ], [
                'title' => 'How does pricing work?',
                'description' => 'The platform sets the hourly rate based on location/city. The platform sets the price to ensure a fair and just price is being charged for services based on the location. We aim to price services at a meaningful discount to local training facilities while trying to ensure that trainers earn more than they otherwise would at these facilities. This dynamic is made possible by personal trainers offering their services on a decentralized basis (ie. from ones home).  ',
                'type' => 'general',
                'status' => 'Active'
            ],

            [
                'title' => 'As a trainer, am I an employee of Chirons?',
                'description' => 'No, you are not employee of Chirons – you are classified as an independent contractor. As a trainer you are under no obligation to work a certain number of hours or perform specific tasks for Chirons directly – you are free to work as little or as much as you would like. In addition, you will not be provided any equipment by Chirons that could be used to conduct training sessions – you must have access to your own equipment. ',
                'type' => 'Trainer',
                'status' => 'Active'
            ],
            [
                'title' => 'Where do training sessions occur?',
                'description' => 'When setting up their profile, personal trainers will have the option to offer travelling to a users home to offer personal training services. Otherwise personal training sessions will be conducted from the home of the personal trainer.
If as a trainer or user you live in a condo or apartment building it is your own responsibility to ensure that you are legally entitled to use any common facilities for the purposes of personal training.
If both the trainer and user agree to meet at a separate location (ex. a gym, a public track etc) for training purposes you both are responsible for ensuring you are legally entitled to use the premises for training purposes. Chirons accepts no responsibility for the use of unauthorized locations by users or personal trainers for personal training. ',
                'type' => 'Trainer',
                'status' => 'Active'
            ],
            [
                'title' => 'What documents do I need to submit as a personal trainer to begin using the platform?',
                'description' => 'You will be required to submit a completed personal training certificate with your name on it, proof of completed CPR training, valid photo identification with an address matching your training location and a utility bill matching your training location (if valid photo identification address is different from training address).
You will also be required to complete a background check prior being authorized to use the platform at no cost to you. ',
                'type' => 'Trainer',
                'status' => 'Active'
            ],
            [
                'title' => 'As a trainer or user do I have to pay to sign up to use the platform?',
                'description' => 'No – the platform is free to use. The only payments required are when hourly sessions are booked. ',
                'type' => 'Trainer',
                'status' => 'Active'
            ],
            [
                'title' => 'As a trainer how and when do I get paid? ',
                'description' => 'The platform will track how many sessions you complete on a weekly basis. You will then be paid the following week via direct deposit based on the number of sessions you completed, after deducting your share of certain fees (specifically, credit card processing fees).',
                'type' => 'Trainer',
                'status' => 'Active'
            ],
            [
                'title' => 'As a trainer do I pay income taxes via the platform? ',
                'description' => 'No – the platform does not deduct any income taxes you may owe. The platform will assist you in tracking your weekly, monthly and annual earnings in your profile so you will know how much you have earned over the course of a year. It is your responsibility to pay any income taxes that you may be due by you.
By offering services from your home you may be eligible to deduct certain expenditures for tax purposes when filing your annual income tax return – we would encourage you to speak to your own tax specialist to learn more about which of your expenditures may be eligible for deduction. ',
                'type' => 'Trainer',
                'status' => 'Active'
            ],
            [
                'title' => 'As a trainer, will the platform collect and remit any sales tax on my behalf? ',
                'description' => 'Each payment cycle you will also be paid the sales tax collected on your behalf by the platform – the amount of sales tax collected will be shown in your profile along with billings and pro-rata costs (ie. credit card fees). The platform will not remit sales tax to the relevant government agency or tax authority on your behalf – this is your responsibility. ',
                'type' => 'Trainer',
                'status' => 'Active'
            ],


            [
                'title' => 'As a user, what about my safety?',
                'description' => 'As a condition to being allowed to use the platform, all personal trainers authorized to use the platform will have to pass a background check.
Most importantly, the platform allows you to contact a personal trainer and establish a relationship prior to booking any sessions. This allows you to get to know one another – you can arrange a time to visit where their location to make sure you are comfortable going there, or you can arrange for them to come visit you if you wish to be trained from your location.
You also have the ability to book a group session (2-on-1) where you can bring a friend or significant other which may be a good option to first get comfortable. ',
                'type' => 'User',
                'status' => 'Active'
            ],
            [
                'title' => 'As a user, how do I know a session I booked is confirmed? ',
                'description' => 'Once you book a session, a trainer will first have to accept or reject the time slot you have booked and location. Once the trainer accepts a booking you will be notified by email.  ',
                'type' => 'User',
                'status' => 'Active'
            ],
            [
                'title' => 'How does payment work?',
                'description' => 'As a user you will be able to pay using major credit cards (ie. Visa, Mastercard, American Express). Payment will be processed once the training session time has lapsed via a third party payment processor.',
                'type' => 'User',
                'status' => 'Active'
            ],
            [
                'title' => 'Can a trainer come to my place to provide services?',
                'description' => 'Some trainers, based on their preference, may be willing to travel to your location to provide services. If this is the case, you should ensure that you have the necessary equipment available to you and/or communicate with the trainer as to which equipment they may need to bring. ',
                'type' => 'User',
                'status' => 'Active'
            ],
        ]);
    }
}
