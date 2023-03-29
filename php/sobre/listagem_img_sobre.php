<?php
                    //diretório onde as imagens estão armazenadas
                $diretorio = '../../galerias/sobre/';

                            // encontra todas as imagens no diretório
                            $imagens = glob($diretorio . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                        // itera sobre as imagens e exibe cada uma delas
                        foreach ($imagens as $imagem) {
                                $caminho_imagem = $imagem;
                                echo '<div class="card text-center" style="padding: 20px; gap: 15px;">';
                                echo '<div class="card-header bg-dark">Sobre</div>';
                                echo '<img src="'.$caminho_imagem.'" class="card-img-top" style="height: 230px; gap: 15px;" alt="Imagem sobre">';
                                echo '<div class="card-body">'; 
                                echo '<p class="card-text"></p>';
                                echo '<a href="./php/sobre/exclui_imagem_sobre.php?imagem='.urlencode($caminho_imagem).'" class="btn btn-danger"">Deletar</a>';
                                echo '</div>';
                                echo '<div class="card-footer text-muted bg-dark"><br></div>';
                                echo '</div>';
                }

                ?>