<?php $v->layout("_theme"); ?>

    <section class="about_page">
        <header class="about_header">
            <h1>Nossa história</h1>
        </header>
        <div class="about_page_content content">
            <header class="about_header">
            <p>A história do Grupo Roncoli remonta a 1975, quando tudo começou modestamente em uma pequena garagem localizada no bairro Centro, em Rio Claro, interior de São Paulo. Naquele cenário simples, o Sr. Roncoli fundou a empresa C.D. Roncoli, com o objetivo de fornecer rolamentos industriais para toda a região. À medida que as vendas cresceram, uma nova perspectiva surgiu: expandir os horizontes do negócio. Foi então que, com o sucesso da empresa, a RTB Rolamentos foi criada, representando a expansão comercial e a consolidação de novos mercados.</p>
                <p>A década de 1980 trouxe um grande avanço para o mercado automotivo, o que proporcionou uma oportunidade única para o Grupo Roncoli. Em 1986, o grupo ampliou sua atuação e inaugurou a primeira loja de Autopeças Roncoli, ao mesmo tempo que sua primeira sede comercial foi estabelecida. Este novo espaço foi batizado como Roncoli Rolamentos e Auto Peças, simbolizando o alicerce de um grupo que começava a crescer no ramo de auto peças e rolamentos.</p>
                <p>Nos anos 90, o grupo alcançou uma fase de grande expansão. Em 1996, com o objetivo de atender a um número cada vez maior de clientes, foi inaugurada um novo seguimento do Comércio de Mangueiras 3R, expandindo o grupo para o mercado de mangueiras e correias industriais. O sucesso foi tão expressivo que, em 1999, a primeira filial do grupo focada em Auto Peças foi aberta em Rio Claro, no bairro Jardim América, um marco na história da empresa.</p>
                <p>O início dos anos 2000 continuou a trajetória de crescimento do Grupo Roncoli. Em 2000, o departamento industrial ganhou uma nova unidade na cidade de Araras, seguida por uma filial em Limeira no ano seguinte. A busca por mais eficiência e alcance levou o grupo a inaugurar, em 2001, um novo Centro de Distribuição, localizado no bairro Vila Paulista, em Rio Claro. Com o objetivo de alcançar novos mercados, em 2004 o grupo abriu uma nova filial do segmento de Auto Peças no bairro Cervezão, também em Rio Claro, e, no mesmo ano, a cidade de Piracicaba recebeu a filial Piramatic, especializada em mangueiras industriais. O ano de 2006 foi especialmente significativo, com a inauguração de duas novas filiais: uma Autopeças em São Carlos e uma loja industrial em São José dos Campos.</p>
                <p>A década de 2010 foi marcada por uma reorganização interna, com a divisão de segmentos do Grupo Roncoli em Rio Claro. A Roncoli Rolamentos Industriais mudou-se para sua nova sede, ao lado da Roncoli Auto Peças. Em sequência, no início da década, a loja de Mangueiras 3R ganhou uma nova sede imponente e seu novo centro de distribuição, consolidando ainda mais a presença do grupo na cidade.</p>
                <p>Hoje, a história do Grupo Roncoli é um testemunho de perseverança, inovação e crescimento. O que começou com o Sr. Roncoli e sua família em uma pequena garagem, foi se expandindo ao longo dos anos, uma empresa que atende vários segmentos comerciais como: Auto Peças, Mangueiras e Rolamentos Industriais. Com esse crescimento surgiu uma nova "família": a família Roncoli, que não só contribui para o crescimento da economia regional, mas também se tornou um símbolo de excelência no setor. O Grupo Roncoli é, sem dúvida, um exemplo de como visão e trabalho árduo podem transformar uma pequena ideia em um grande legado.</p>
            </header>
            <!--FEATURES-->
            <div class="about_page_steps">
                <?php foreach ($history as $post): ?>
                    <article class="radius">
                        <header>
                            <img src="<?= image($post->cover, 600, 340); ?>">
                            <h3><?= $post->title; ?></h3>
                            <p><?= html_entity_decode($post->content); ?>
                            </p>
                        </header>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>