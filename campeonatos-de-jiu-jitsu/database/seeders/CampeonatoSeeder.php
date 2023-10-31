<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampeonatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('campeonatos')->truncate();

        // Insere um usuário de exemplo
        DB::table('campeonatos')->insert([
            'codigo' => '123456789',
            'titulo' => 'Campeonato Regional Santista 2024',
            'imagem' => 'images/cropped_1698767967.jpg',
            'cidade' => 'Santos',
            'estado' => 'São Paulo',
            'data_realizacao' => '2023-10-31',
            'sobre_evento' => '<p>O evento contar&aacute; com a presen&ccedil;a do Mestre Royce Gracie, um dos maiores nomes do Jiu-Jitsu mundial. Royce ser&aacute; um dos avaliadores da competi&ccedil;&atilde;o e participar&aacute; de uma mesa redonda com atletas e t&eacute;cnicos. O evento &eacute; uma &oacute;tima oportunidade para os atletas de Santos e regi&atilde;o mostrarem seu talento e competirem com outros atletas de alto n&iacute;vel.</p>',
            'ginasio' => '<p>A Arena Santos &eacute; um gin&aacute;sio poliesportivo localizado na cidade de Santos, no estado de S&atilde;o Paulo. &Eacute; o maior gin&aacute;sio do munic&iacute;pio, com capacidade para 5.000 pessoas. O gin&aacute;sio foi inaugurado em 2010 e &eacute; utilizado para a realiza&ccedil;&atilde;o de eventos esportivos, culturais e sociais. J&aacute; recebeu competi&ccedil;&otilde;es de futsal, v&ocirc;lei, basquete, handebol, jud&ocirc;, taekwondo, capoeira, entre outros. Tamb&eacute;m j&aacute; foi palco de shows, feiras e eventos corporativos.</p>',
            'informacoes_gerais' => '<p>Al&eacute;m de Royce Gracie, o evento santista contar&aacute; com a presen&ccedil;a de outros grandes nomes do Jiu Jitsu, como Andr&eacute; Galv&atilde;o, Rodolfo Vieira e Leandro Lo. O evento tamb&eacute;m ter&aacute; uma programa&ccedil;&atilde;o cultural, com shows de m&uacute;sica e dan&ccedil;a. O evento &eacute; uma grande oportunidade para os atletas de Santos e regi&atilde;o mostrarem seu talento para o Jiu Jitsu. &Eacute; tamb&eacute;m uma oportunidade para os f&atilde;s da modalidade assistirem a grandes lutas e conhecerem os &iacute;dolos do Jiu Jitsu. A expectativa &eacute; que o evento seja um sucesso de p&uacute;blico e cr&iacute;tica.</p>',
            'entrada_publico' => '<p>R$ 10,00 entrada com Doacao de 1 kg de alimento ( sem ser perec&iacute;vel , a&ccedil;&uacute;car e sal ), ou pacote de ra&ccedil;&atilde;o animal.</p>

            <p>R$ 20,00 entrada sem doa&ccedil;&atilde;o.</p>

            <p><em>*proibido levar animal de estima&ccedil;&atilde;o ( cachorro , gato e outros ). Norma do Arena Santos.</em></p>

            <p>Isentos:</p>

            <ul>
                <li>- Professor faixa preta de atleta inscrito &eacute; isento ( mostrando a carteira na entrada , de qualquer entidade oficial).</li>
                <li>- 1 Acompanhante de menor de 14 anos &eacute; isento.</li>
                <li>- Atleta participante &eacute; isento.</li>
            </ul>

            <p>Os ingressos s&atilde;o vendidos no dia e local do evento.</p>',
            'tipo' => 'Kimono',
            'fase' => 'Inscrição',
            'status' => 'Ativo',
        ]);
        DB::table('campeonatos')->insert([
            'codigo' => '151548',
            'titulo' => 'Campeonato Pernambucano 2023',
            'imagem' => 'iimages/cropped_1698777957.jpg',
            'cidade' => 'João Pessoa',
            'estado' => 'Pernambuco',
            'data_realizacao' => '2023-10-24',
            'sobre_evento' => '<p>O evento contar&aacute; com a presen&ccedil;a do Mestre Royce Gracie, um dos maiores nomes do Jiu-Jitsu mundial. Royce ser&aacute; um dos avaliadores da competi&ccedil;&atilde;o e participar&aacute; de uma mesa redonda com atletas e t&eacute;cnicos. O evento &eacute; uma &oacute;tima oportunidade para os atletas de Santos e regi&atilde;o mostrarem seu talento e competirem com outros atletas de alto n&iacute;vel.</p>',
            'ginasio' => '<p>A Arena Santos &eacute; um gin&aacute;sio poliesportivo localizado na cidade de Santos, no estado de S&atilde;o Paulo. &Eacute; o maior gin&aacute;sio do munic&iacute;pio, com capacidade para 5.000 pessoas. O gin&aacute;sio foi inaugurado em 2010 e &eacute; utilizado para a realiza&ccedil;&atilde;o de eventos esportivos, culturais e sociais. J&aacute; recebeu competi&ccedil;&otilde;es de futsal, v&ocirc;lei, basquete, handebol, jud&ocirc;, taekwondo, capoeira, entre outros. Tamb&eacute;m j&aacute; foi palco de shows, feiras e eventos corporativos.</p>',
            'informacoes_gerais' => '<p>Al&eacute;m de Royce Gracie, o evento santista contar&aacute; com a presen&ccedil;a de outros grandes nomes do Jiu Jitsu, como Andr&eacute; Galv&atilde;o, Rodolfo Vieira e Leandro Lo. O evento tamb&eacute;m ter&aacute; uma programa&ccedil;&atilde;o cultural, com shows de m&uacute;sica e dan&ccedil;a. O evento &eacute; uma grande oportunidade para os atletas de Santos e regi&atilde;o mostrarem seu talento para o Jiu Jitsu. &Eacute; tamb&eacute;m uma oportunidade para os f&atilde;s da modalidade assistirem a grandes lutas e conhecerem os &iacute;dolos do Jiu Jitsu. A expectativa &eacute; que o evento seja um sucesso de p&uacute;blico e cr&iacute;tica.</p>',
            'entrada_publico' => '<p>R$ 10,00 entrada com Doacao de 1 kg de alimento ( sem ser perec&iacute;vel , a&ccedil;&uacute;car e sal ), ou pacote de ra&ccedil;&atilde;o animal.</p>

            <p>R$ 20,00 entrada sem doa&ccedil;&atilde;o.</p>

            <p><em>*proibido levar animal de estima&ccedil;&atilde;o ( cachorro , gato e outros ). Norma do Arena Santos.</em></p>

            <p>Isentos:</p>

            <ul>
                <li>- Professor faixa preta de atleta inscrito &eacute; isento ( mostrando a carteira na entrada , de qualquer entidade oficial).</li>
                <li>- 1 Acompanhante de menor de 14 anos &eacute; isento.</li>
                <li>- Atleta participante &eacute; isento.</li>
            </ul>

            <p>Os ingressos s&atilde;o vendidos no dia e local do evento.</p>',
            'tipo' => 'Kimono',
            'fase' => 'Resultado',
            'status' => 'Ativo',
        ]);
        DB::table('campeonatos')->insert([
            'codigo' => '45789',
            'titulo' => 'GDF Cup Internacional 2023',
            'imagem' => 'images/cropped_1698778052.jpeg',
            'cidade' => 'Praia Grande',
            'estado' => 'São Paulo',
            'data_realizacao' => '2023-11-02',
            'sobre_evento' => '<p>O evento contar&aacute; com a presen&ccedil;a do Mestre Royce Gracie, um dos maiores nomes do Jiu-Jitsu mundial. Royce ser&aacute; um dos avaliadores da competi&ccedil;&atilde;o e participar&aacute; de uma mesa redonda com atletas e t&eacute;cnicos. O evento &eacute; uma &oacute;tima oportunidade para os atletas de Santos e regi&atilde;o mostrarem seu talento e competirem com outros atletas de alto n&iacute;vel.</p>',
            'ginasio' => '<p>A Arena Santos &eacute; um gin&aacute;sio poliesportivo localizado na cidade de Santos, no estado de S&atilde;o Paulo. &Eacute; o maior gin&aacute;sio do munic&iacute;pio, com capacidade para 5.000 pessoas. O gin&aacute;sio foi inaugurado em 2010 e &eacute; utilizado para a realiza&ccedil;&atilde;o de eventos esportivos, culturais e sociais. J&aacute; recebeu competi&ccedil;&otilde;es de futsal, v&ocirc;lei, basquete, handebol, jud&ocirc;, taekwondo, capoeira, entre outros. Tamb&eacute;m j&aacute; foi palco de shows, feiras e eventos corporativos.</p>',
            'informacoes_gerais' => '<p>Al&eacute;m de Royce Gracie, o evento santista contar&aacute; com a presen&ccedil;a de outros grandes nomes do Jiu Jitsu, como Andr&eacute; Galv&atilde;o, Rodolfo Vieira e Leandro Lo. O evento tamb&eacute;m ter&aacute; uma programa&ccedil;&atilde;o cultural, com shows de m&uacute;sica e dan&ccedil;a. O evento &eacute; uma grande oportunidade para os atletas de Santos e regi&atilde;o mostrarem seu talento para o Jiu Jitsu. &Eacute; tamb&eacute;m uma oportunidade para os f&atilde;s da modalidade assistirem a grandes lutas e conhecerem os &iacute;dolos do Jiu Jitsu. A expectativa &eacute; que o evento seja um sucesso de p&uacute;blico e cr&iacute;tica.</p>',
            'entrada_publico' => '<p>R$ 10,00 entrada com Doacao de 1 kg de alimento ( sem ser perec&iacute;vel , a&ccedil;&uacute;car e sal ), ou pacote de ra&ccedil;&atilde;o animal.</p>

            <p>R$ 20,00 entrada sem doa&ccedil;&atilde;o.</p>

            <p><em>*proibido levar animal de estima&ccedil;&atilde;o ( cachorro , gato e outros ). Norma do Arena Santos.</em></p>

            <p>Isentos:</p>

            <ul>
                <li>- Professor faixa preta de atleta inscrito &eacute; isento ( mostrando a carteira na entrada , de qualquer entidade oficial).</li>
                <li>- 1 Acompanhante de menor de 14 anos &eacute; isento.</li>
                <li>- Atleta participante &eacute; isento.</li>
            </ul>

            <p>Os ingressos s&atilde;o vendidos no dia e local do evento.</p>',
            'tipo' => 'Kimono',
            'fase' => 'Inscrição',
            'status' => 'Ativo',
        ]);
    }
}
