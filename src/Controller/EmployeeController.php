<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    #[Route('/employee/{id}', name: 'show_employee')]
    public function showEmployee(Employee $employee): Response {
        // Getting employee's id using ParamConverter

        return $this->render('employee/show_employee.html.twig', [
            "employee" => $employee,
        ]);   
    }
}
