<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GradoSeeder extends Seeder
{
    public function run()
    {
        $this->db->query('truncate grado restart identity');

        $data = [
            [
                'nom_grado' => 'Verde',
                'edad' => 'adulto',
                'color' => 'verde',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Entrenar regularmente en alguna de las sedes o clubes LDM por lo menos seis meses previos al batizado. Tener 13 años cumplidos al día del batizado. Presentar el examen de evaluación con el uniforme del grupo (Abadá blanco y playera anual). Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del Batizado con el uniforme del grupo. Cumplir con el Módulo 1 (3 lecciones) de Curso de Historia de Brasil para Capoeiristas.',
                'musica' => 'Tocar y cantar con cualquier instrumento. Cantar un corrido.',
                'cultura' => 'Origenes y figuras relevantes. Escribir versos de personaje en Paranaue.',
                'jogo' => '8 secuencias de Bimba. Entrar y salir de roda, comprar, coros, cambio instrumentos.',
                'orden' => 1,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Apropiación Verde amarelo',
                'edad' => 'adulto',
                'color' => '3verde_1amarillo',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Entrenarse regularmente en alguna de las sedes o clubes LDM por lo menos seis meses previos a la ceremonia de Troca. Tener por lo menos un año 6 meses de entrenamiento y contar con el grado anterior (VERDE). Presentar el examen de evaluación con el uniforme del grupo. Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del Batizado con el uniforme del grupo. Cumplir con el Módulo 2 (3 lecciones) de Curso de Historia de Brasil para Capoeiristas.',
                'musica' => 'Tocar y cantar con cualquier instrumento. Cantar un corrido.',
                'cultura' => 'Origenes y figuras relevantes. Escribir versos de personaje en Paranaue.',
                'jogo' => 'Secuencias de Angola y Contemporánea. Convenciones básicas y participación en roda.',
                'orden' => 2,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Verde amarelo',
                'edad' => 'adulto',
                'color' => 'verde_amarillo',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Entrenarse regularmente en alguna de las sedes LDM por lo menos seis meses previos al evento de graduacion. Tener por lo menos 2 años 6 meses de entrenamiento y contar con el grado anterior (Apropiacion VERDE AMARILLO). Cursar el taller de Método Musical LDM (onLine). Presentar el examen de evaluación con el uniforme del grupo. Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del batizado con el uniforme del grupo. Cumplir con el Módulo 3 (4 lecciones) del Curso de Historia de Brasil para Capoeiristas.',
                'musica' => 'Toques básicos pandeiro, atabaque, agogo y reco-reco. Bases de berimbau Angola, São Bento Grande de Angola, Jogo de dentro. Diferencia entre Ladainha, Quadra y Corrido. Módulo 1 método musical LDM.',
                'cultura' => 'Leer "orixas capoeira" y "El mito en capoeira" Revista IE Proyecto Patuá y escribir ladainha de algún personaje.',
                'jogo' => 'Secuencias Angola y Contemporánea.',
                'orden' => 3,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Apropiación Amarelo',
                'edad' => 'adulto',
                'color' => '1verde_3amarillo',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Entrenarse regularmente en alguna de las sedes o clubes LDM por lo menos seis meses previos al batizado. Tener por lo menos 3 años 6 meses de entrenamiento y contar con el grado anterior (VERDE AMARILLO). Presentar el examen de evaluación con el uniforme del grupo. Aprobar el examen de evaluación. Asistir puntualmente a la cita el dia del Batizado con el uniforme del grupo. Cumplir con el Módulo 4 (3 lecciones) del Curso de Historia de Brasil para Capoeiristas.',
                'musica' => 'Toques básicos atabaque, agogo, reco-reco y toque redondo de pandero. Chamados de entrada y salida en berimbau.',
                'cultura' => 'Leer el texto "IE GALO CANTOU LAS RAÍCES". Participar en una "Roda de saberes".',
                'jogo' => 'Secuencias de Cinturas desprezadas.',
                'orden' => 4,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Amarelo',
                'edad' => 'adulto',
                'color' => 'amarillo',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Entrenarse regularmente en alguna de las sedes o clubes LDM por lo menos seis meses previos al batizado. Tener por lo menos 4 años 6 meses de entrenamiento y contar con el grado anterior ( Intermedia VERDE amarillo). Presentar el examen de evaluación con el uniforme del grupo. Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del batizado con el uniforme el grupo. Cumplir con el Módulo 5 y 6 (7 lecciones) del Curso de Historia de Brasil para Capoeiristas.',
                'musica' => 'Toques básicos atabaque, agogo, reco-reco y toque redondo de pandero. Chamados de entrada y salida en berimbau. Toques de berimbau São Bento pequeno, Banguela, São Bento Grande de Regional y Miudinho. Cantar una Ladainha, Quadra y Corrido tocando berimbau. Toques de Berimbau del libro de Ramiro Mussoto.',
                'cultura' => 'Leer capitulos 17,18,19 libro "Capoeira: pasado, presente y futuro de una práctica afrobrasileña", respondiendo: ¿Qué parte me impactó más? ¿Qué emoción me provocó? ¿Qué relación tiene con mi vida?',
                'jogo' => 'Secuencias de Cinturas desprezadas en un jogo (coreografía).',
                'orden' => 5,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Apropiación Monitor',
                'edad' => 'adulto',
                'color' => '3amarillo_1azul',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Entrenarse regularmente en alguna de las sedes o clubes LDM por lo menos seis meses previos al batizado. Tener por lo menos 5 años 6 meses de entrenamiento y contar con el grado anterior (Amarillo). Presentar el examen de evaluación con el uniforme del grupo. Aprobar el examen de evaluación. Asistir puntualmente a la cita el dia del batizado con el uniforme del grupo. Cumplir con el Módulo 7 y 8 (6 lecciones) del Curso de Historia de Brasil para Capoeiristas.',
                'musica' => 'Destreza en todos los instrumentos. Cantar y tocar con todos los instrumentos. Tablaturas para solos de libro Ramiro Musotto para grado de Apropiación de Monitor.',
                'cultura' => 'Leer el texto "Mi Mestre no es brasileño" de David Contreras. Participa en "Roda de Saberes" respondiendo: ¿Qué parte me impactó más? ¿Qué emoción me provocó? ¿Qué relación tiene con mi vida?',
                'jogo' => 'Ejecución de las 6 secuencias de derribe ("Vacunas"). Participación activa en rodas, demostrando liderazgo, respeto y comprensión de las reglas básicas.',
                'orden' => 6,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Monitor',
                'edad' => 'adulto',
                'color' => 'amarillo_azul',
                'iniciales' => 'Mn',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Entrenarse regularmente en alguna de las sedes o clubes LDM por lo menos seis meses previos al batizado. Tener por lo menos 6 años 6 meses de entrenamiento y contar con el grado anterior ( Intermedia amarillo AZUL). Presentar el examen de evaluación con el uniforme del grupo. Aprobar el examen de evaluación del grupo. Asistir puntualmente a la cita el dia del batizado con el uniforme del grupo. Cumplir con el Módulo 9 y 10 (6 lecciones) del Curso de Historia de Brasil para Capoeiristas.',
                'musica' => 'Destreza en todos los instrumentos. Cantar y tocar con todos los instrumentos. Tablaturas para solos de libro Ramiro Musotto para grado de Monitor. Toques de berimbau de Jogo de dentro, Iuna, Cavalaria y Samba. Presentarse con berimbau propio y armarlo. Cantar una cuadra y un corrido con el toque de São Bento Grande de Bimba.',
                'cultura' => 'Leer el texto "¿Globalización, glocalización o diáspora?" de David Contreras capitulo 9 y participar en una "Roda de Saberes".',
                'jogo' => 'Juego de capoeira usando las 6 secuencias de derribe ("Vacunas"). Dirigir una clase ante los evaluadores de las 8 secuencias de Bimba. Dirigir una Roda de Capoeira.',
                'orden' => 7,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Instructor',
                'edad' => 'adulto',
                'color' => 'azul',
                'iniciales' => 'In',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con las cuotas y obligaciones. Haber entrenado en alguna de las sedes o clubes LDM al menos seis meses previos al batizado. Tener mínimo ocho años de entrenamiento. Haber obtenido el grado anterior (Amarelo- Azul). Asistir regularmente a las rodas del grupo y fomentar un comportamiento según las convenciones de LDM en clases, rodas y eventos. Contar al menos con 24 horas de práctica como ayudante de clases y 24 horas de trabajo en actividades del grupo (exhibiciones, encuentros y batizados). Hacerse cargo de la organización de una exhibición o roda. Presentar el examen de evaluación con el uniforme del grupo. Aprobar el examen de evaluación del grupo. Asistir puntualmente a la cita el día del batizado con el uniforme del grupo. Dirigir una roda de capoeira.',
                'musica' => 'Toques de berimbau: São Bento Grande de Regional, Jogo de Dentro, Cavalaria, Miudinho, Santa Maria, Samba de Roda, Iuna, Amazonas, Idalina. En agogô: Jogo de dentro, Miudinho, Samba de roda y Maculelê. En pandeiro: Toque redondo, São Bento Grande de Regional, Miudinho, Samba de Roda. En atabaque: Ijexá, Maculelê, Puxada de Rede, Samba de Roda. En reco-reco: Miudinho y Samba de Roda. Armar berimbau. Cantar y tocar con todos los instrumentos. Toques para ensamble de tres berimbaus con chamados de entrada y salida. Reconocer la estructura de una cantiga, una ladainha, una quadra, una chula o un corrido. Leer y escribir notación para berimbau.',
                'cultura' => 'Mapa mental de forma individual o grupal durante el día de evaluación sobre "Bimba, Perfil do Mestre" de Mestre Itapoan y "Capoeira Angola" de Mestre Pastinha (pp 1-30). Ensayo libre sobre tu historia o experiencia dentro de la capoeira. Conocer el comportamiento en caso de accidentes, visitas, exhibiciones y jogo con principiantes.',
                'jogo' => 'Dos secuencias de primer y cuarto grado. Tres de tercer grado. Una de cinturas desprezadas.',
                'orden' => 8,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Profesor',
                'edad' => 'adulto',
                'color' => '1verde_1amarillo_2azul',
                'iniciales' => 'Pf',
                'requisitos' => '',
                'musica' => '',
                'cultura' => '',
                'jogo' => '',
                'orden' => 9,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Contramestre',
                'edad' => 'adulto',
                'color' => 'verde_amarillo_azul_blanco',
                'iniciales' => 'Cm',
                'requisitos' => '',
                'musica' => '',
                'cultura' => '',
                'jogo' => '',
                'orden' => 10,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Mestre',
                'edad' => 'adulto',
                'color' => 'verde_blanco',
                'iniciales' => 'M',
                'requisitos' => '',
                'musica' => '',
                'cultura' => '',
                'jogo' => '',
                'orden' => 11,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Verde',
                'edad' => 'adulto_mayor',
                'color' => 'verde',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Entrenar regularmente en alguna de las sedes o clubes LDM por lo menos seis meses previos al batizado. Solicitar la evaluación cualitativa. Presentar el examen de evaluación con el uniforme del grupo (Abadá blanco y playera anual). Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del batizado con el uniforme del grupo.',
                'musica' => 'Cantar y tocar palmas al mismo tiempo. Cantar algún corrido tradicional de capoeira.',
                'cultura' => 'Comprensión básica de los orígenes de la Capoeira y sus figuras más relevantes. Escribir versos sobre un personaje del texto en modo "Paranaue" (pueden ser en español).',
                'jogo' => 'Pasos basicos de ginga, desplazamientos y patadas básicas. Participación activa en roda, demostrando respeto y comprensión de las reglas básicas.',
                'orden' => 1,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Apropiación Verde amarelo',
                'edad' => 'adulto_mayor',
                'color' => '3verde_1amarillo',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Entrenarse regularmente en alguna de las sedes o clubes LDM por lo menos seis meses previos al batizado. Tener por lo menos 1 año 6 meses de entrenamiento y contar con el grado anterior. Presentar el examen de evaluación con el uniforme del grupo. Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del batizado con el uniforme del grupo.',
                'musica' => 'Seguir ritmos básicos con palmas instrumentos de percusión ligera. Cantar dos canciones.',
                'cultura' => 'Escojer uno de los dos textos siguientes y crear un cartel:. "Mitos, controversias y hechos: construyendo la historia de la capoeira - Mestre Luiz Renato Vieira (p 5-16). "Sobre el estatus de los mitos y leyendas en la Capoeira", "De los abejorros, Héroes y zombies" - revista IE Proyecto Patuá.',
                'jogo' => 'Secuencias simples de movimiento adaptadas. Chamados de Angola. Participar en una roda con acompañamiento.',
                'orden' => 2,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Verde amarelo',
                'edad' => 'adulto_mayor',
                'color' => 'verde_amarillo',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Entrenarse regularmente en alguna de las sedes o clubes LDM por lo menos seis meses previos al batizado. Tener por lo menos 2 años 6 meses de entrenamiento contar con el grado anterior (APROPIACION VERDE AMARILLO). Presentar el examen de evaluación con el uniforme del grupo. Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del batizado con el uniforme del grupo.',
                'musica' => 'Reconocimiento auditivo de toques de Sao Bento grande y Angola de berimbau. Palmas rítmicas simples y percusión ligera. Cantar 3 canciones.',
                'cultura' => 'Leer "orixas capoeira" y "El mito en capoeira" Revista IE Proyecto Patuá y escribir ladainha de algún personaje.',
                'jogo' => 'Reconocimiento del espacio, la roda y sus dinámicas básicas: ubicacion de la bateria, entrada y salida de la roda, comprar jogos. Movimientos adaptados: ginga, esquivas, desplazamientos. Participar en una roda con acompañamiento.',
                'orden' => 3,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Primer grado',
                'edad' => 'niño',
                'color' => 'aqua',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Presentar el examen de evaluación con el uniforme del grupo (Abadá blanco y playera anual). Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del Batizado con el uniforme del grupo.',
                'musica' => 'Saber el nombre de los instrumentos. Cantar una canción (opcional).',
                'cultura' => 'Saber de dónde viene la capoeira.',
                'jogo' => 'Participar en una roda. Ejecutar ginga, meia lua de frente, queixada, cocorinha y aú.',
                'orden' => 1,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Segundo grado',
                'edad' => 'niño',
                'color' => '3aqua_1limon',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Presentar el examen de evaluación con el uniforme del grupo (Abadá blanco y playera anual). Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del Batizado con el uniforme del grupo.',
                'musica' => 'Saber el nombre de los instrumentos. Cantar una canción (opcional).',
                'cultura' => 'Saber de dónde viene la capoeira.',
                'jogo' => 'Participar en una roda. Ejecutar ginga, meia lua de frente, queixada, cocorinha y aú.',
                'orden' => 2,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Tercer grado',
                'edad' => 'niño',
                'color' => 'aqua_limon',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Presentar el examen de evaluación con el uniforme del grupo (Abadá blanco y playera anual). Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del Batizado con el uniforme del grupo.',
                'musica' => 'Saber el nombre de los instrumentos. Cantar una canción (opcional).',
                'cultura' => 'Saber de dónde viene la capoeira.',
                'jogo' => 'Participar en una roda. Ejecutar ginga, meia lua de frente, queixada, cocorinha y aú.',
                'orden' => 3,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Cuarto grado',
                'edad' => 'niño',
                'color' => '1aqua_3limon',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Presentar el examen de evaluación con el uniforme del grupo (Abadá blanco y playera anual). Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del Batizado con el uniforme del grupo.',
                'musica' => 'Saber el nombre de los instrumentos. Cantar una canción (opcional).',
                'cultura' => 'Saber de dónde viene la capoeira.',
                'jogo' => 'Participar en una roda. Ejecutar ginga, meia lua de frente, queixada, cocorinha, aú, meia lua de frente con armada, meia lua de compasso, aú con una mano y ponte.',
                'orden' => 4,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Quinto grado',
                'edad' => 'niño',
                'color' => 'limon',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Presentar el examen de evaluación con el uniforme del grupo (Abadá blanco y playera anual). Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del Batizado con el uniforme del grupo.',
                'musica' => 'Saber el nombre de los instrumentos. Cantar una canción (opcional).',
                'cultura' => 'Saber de dónde viene la capoeira.',
                'jogo' => 'Participar en una roda. Ejecutar ginga, meia lua de frente, queixada, cocorinha, aú, meia lua de frente con armada, meia lua de compasso, aú con una mano y ponte.',
                'orden' => 5,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Sexto grado',
                'edad' => 'niño',
                'color' => '3limon_1opalo',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Presentar el examen de evaluación con el uniforme del grupo (Abadá blanco y playera anual). Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del Batizado con el uniforme del grupo.',
                'musica' => 'Saber el nombre de los instrumentos. Cantar una canción (opcional).',
                'cultura' => 'Saber de dónde viene la capoeira.',
                'jogo' => 'Participar en una roda. Ejecutar ginga, meia lua de frente, queixada, cocorinha, aú, meia lua de frente con armada, meia lua de compasso, aú con una mano y ponte.',
                'orden' => 6,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Séptimo grado',
                'edad' => 'niño',
                'color' => 'limon_opalo',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Presentar el examen de evaluación con el uniforme del grupo (Abadá blanco y playera anual). Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del Batizado con el uniforme del grupo.',
                'musica' => 'Saber el nombre de los instrumentos. Cantar una canción. Ejecutar la base de cualquier instrumento mientras responde los coros de alguna canción.',
                'cultura' => 'Saber quiénes fueron Mestre Bimba y Mestre Pastinha',
                'jogo' => 'Participar en una roda. Ejecutar tres secuencias de Mestre Bimba (1, 2 y 8).',
                'orden' => 7,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Octavo grado',
                'edad' => 'niño',
                'color' => '1limon_3opalo',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Presentar el examen de evaluación con el uniforme del grupo (Abadá blanco y playera anual). Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del Batizado con el uniforme del grupo.',
                'musica' => 'Saber el nombre de los instrumentos. Cantar una canción. Ejecutar la base de cualquier instrumento mientras responde los coros de alguna canción.',
                'cultura' => 'Saber quiénes fueron Mestre Bimba y Mestre Pastinha',
                'jogo' => 'Participar en una roda. Ejecutar tres secuencias de Mestre Bimba (1, 2 y 8).',
                'orden' => 8,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Noveno grado',
                'edad' => 'niño',
                'color' => 'opalo',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Presentar el examen de evaluación con el uniforme del grupo (Abadá blanco y playera anual). Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del Batizado con el uniforme del grupo.',
                'musica' => 'Saber el nombre de los instrumentos. Cantar una canción. Ejecutar la base de cualquier instrumento mientras responde los coros de alguna canción.',
                'cultura' => 'Saber quiénes fueron Mestre Bimba y Mestre Pastinha',
                'jogo' => 'Participar en una roda. Ejecutar cinco secuencias de Mestre Bimba (1, 2, 3, 5 y 7).',
                'orden' => 9,
                'activo' => 1
            ],
            [
                'nom_grado' => 'Décimo grado',
                'edad' => 'niño',
                'color' => '1aqua_1limon_2opalo',
                'iniciales' => '',
                'requisitos' => 'Estar afiliado a Capoeira Longe do Mar AC. Estar al corriente con sus cuotas y obligaciones. Presentar el examen de evaluación con el uniforme del grupo (Abadá blanco y playera anual). Aprobar el examen de evaluación. Asistir puntualmente a la cita el día del Batizado con el uniforme del grupo.',
                'musica' => 'Saber el nombre de los instrumentos. Cantar una canción. Ejecutar la base de cualquier instrumento mientras responde los coros de alguna canción.',
                'cultura' => 'Saber quiénes fueron Mestre Bimba y Mestre Pastinha',
                'jogo' => 'Participar en una roda. Ejecutar cinco secuencias de Mestre Bimba (1, 2, 3, 5 y 7).',
                'orden' => 10,
                'activo' => 1
            ],
        ];

        $this->db->table('grado')->insertBatch($data);
    }
}
