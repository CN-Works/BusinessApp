<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeType;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeeController extends AbstractController
{
    #[Route('/employee', name: 'app_employee')]
    public function index(EmployeeRepository $employeeRepository): Response
    {
        // getting all employees from SocietyRepository
        $employees = $employeeRepository->findBy([],["firstname" => "ASC"]);
        return $this->render('employee/index.html.twig', [
            "employees" => $employees,
        ]);
    }

    #[Route('/employee/new', name: 'new_employee')]
    #[Route('/employee/{id}/edit', name: 'edit_employee')]
    public function new(Employee $employee = null,Request $request, EntityManagerInterface $entityManager): Response
    {
        if(!$employee) {
            $employee = new Employee();
        }

        $form = $this->createForm(EmployeeType::class, $employee );

        $form->handleRequest($request);

        // Checks if form inputs are in a valid type
        if ($form->isSubmitted() && $form->isValid()) {

            // Affecting the form data into the object
            $society = $form->getData();

            // Preparing society object
            $entityManager->persist($employee);
            // Saving in db
            $entityManager->flush();

            // Redirection to all societies
            return $this->redirectToRoute("app_employee");
        }

        return $this->render('employee/new.html.twig', [
            'formAddEmployee' => $form,
        ]);
    }

    #[Route('/employee/{id}', name: 'show_employee')]
    public function showEmployee(Employee $employee): Response {
        // Getting employee's id using ParamConverter

        return $this->render('employee/show_employee.html.twig', [
            "employee" => $employee,
        ]);   
    }
}
