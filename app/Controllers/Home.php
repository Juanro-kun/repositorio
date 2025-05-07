<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('nueva_plantilla');
    }

    public function quienes()
    {
        return view('quienes', ['title' => 'Quiénes Somos']);
    }

    public function comercializacion()
    {
        return view('comercializacion', ['title' => 'Comercialización']);
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function enviarConsulta()
    {
        $nombre = $this->request->getPost('nombre');
        $email = $this->request->getPost('email');
        $asunto = $this->request->getPost('asunto');
        $mensaje = $this->request->getPost('mensaje');

        $emailService = \Config\Services::email();
        $emailService->setFrom('tucorreo@gmail.com', 'La Taberna del Gnomo Errante');
        $emailService->setTo('tobiasorban00@gmail.com');
        $emailService->setSubject('Consulta desde la Web: ' . $asunto);

        $body = "
            <h3>Nuevo mensaje desde la web:</h3>
            <p><strong>Nombre:</strong> {$nombre}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Asunto:</strong> {$asunto}</p>
            <p><strong>Mensaje:</strong><br>{$mensaje}</p>
        ";

        $emailService->setMessage($body);
        $emailService->setMailType('html');

        if ($emailService->send()) {
            return redirect()->to(base_url('home/contacto'))->with('success', 'Mensaje enviado correctamente.');
        } else {
            return redirect()->to(base_url('home/contacto'))->with('error', 'Error al enviar el mensaje. Intente más tarde.');
        }
    }

    public function terminos()
    {
        return view('terminos');
    }

    public function nuevos_jugadores()
    {
        return view('nuevos_jugadores');
    }

    public function proximamente()
    {
        return view('proximamente');
    }

    public function catalogo()
    {
        return view('catalogo');
    }

    public function catalogoDetalle($slug)
    {
        $productos = [
            'espada-magica' => [
                'nombre' => 'Espada Mágica',
                'descripcion' => 'Una espada imbuida con magia arcana. +10 ataque.',
                'descripcion_larga' => 'Una espada legendaria forjada por magos antiguos que otorga +10 de ataque.',
                'precio' => 120000,
                'imagen' => 'guia1.jpg',
                'rareza' => 'Épica',
                'uso' => 'Ideal para guerreros y magos.'
            ],
            'pocion-curativa' => [
                'nombre' => 'Poción Curativa',
                'descripcion' => 'Recupera 50HP al instante.',
                'descripcion_larga' => 'Una poción mágica que cura al instante 50 puntos de vida.',
                'precio' => 2500,
                'imagen' => 'pocion.png',
                'rareza' => 'Común',
                'uso' => 'Ideal para cualquier aventurero en combate.'
            ],
            'escudo-legendario' => [
                'nombre' => 'Escudo Legendario',
                'descripcion' => 'Protección impenetrable ante ataques físicos.',
                'descripcion_larga' => 'Un escudo forjado por dioses para resistir cualquier golpe.',
                'precio' => 80000,
                'imagen' => 'escudo.png',
                'rareza' => 'Legendario',
                'uso' => 'Ideal para tanques y paladines.'
            ],
            'armadura-dragon' => [
                'nombre' => 'Armadura de Dragón',
                'descripcion' => 'Hecha con escamas de dragón. Reduce daño en 75%.',
                'descripcion_larga' => 'Una armadura que otorga resistencia masiva al daño.',
                'precio' => 250000,
                'imagen' => 'armadura.png',
                'rareza' => 'Épica',
                'uso' => 'Ideal para los aventureros más poderosos.'
            ]
        ];
    
        if (!isset($productos[$slug])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Producto no encontrado");
        }
    
        $producto = $productos[$slug];
    
        return view('detalle_producto', ['producto' => $producto]);
    }
    
}


