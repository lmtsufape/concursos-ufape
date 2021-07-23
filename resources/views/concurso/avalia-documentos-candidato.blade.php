@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="@if($arquivos->inscricao->concurso->users_id == auth()->user()->id) col-md-10 @elseif(auth()->user()->role == "presidenteBancaExaminadora") col-md-4 @endif" style="margin-bottom: 2rem;">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">2º Fase: Documentos</h6>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Dados Pessoais
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    <ul style="margin-left: -20px;">
                                        <li>Carteira de Identidade ou do Documento de Identidade Profissional (Conselhos de Classes) ou da Carteira Nacional de Habilitação - CNH.</li>
                                        <li>Cópia autenticada do Passaporte ou de Cédula de Identidade de Estrangeiro, caso o candidato seja estrangeiro.</li>
                                        <li>Cartão do Cadastro de Pessoa Física - CPF (dispensado para o candidato estrangeiro).</li>
                                        <li>Certidão de quitação eleitoral (emitida pelo site do TRE ou cartório eleitoral).</li>
                                        <li>Documento comprobatório da quitação com serviço militar, para os candidatos do sexo masculino a partir de 1º dia de janeiro do ano em 
                                            completar 18 (dezoito) anos de idade até 31 de dezembro do ano em que completar 45 (quarenta e cinco) anos.
                                        </li>
                                        <li>Documento oficial que comprove que o candidato não possui antecedentes criminais.</li>
                                        <li>Comprovante do pagamento da taxa de inscrição.</li>
                                    </ul>
                                </h6>
                                @if ($arquivos == null || $arquivos->dados_pessoais == null)
                                    <div class="d-flex justify-content-left">
                                        <div>
                                            <a class="btn btn-primary">
                                                <div class="btn-group">
                                                    <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                    <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div style="margin-left:10px">
                                            <h6 style="color: red">Documento ainda <br>não foi enviado.</h6>
                                        </div>
                                    </div>
                                @else
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Dados-pessoais"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Curriculum vitae modelo Lattes
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    <ul style="margin-left: -20px;">
                                        <li>Curriculum Vitae modelo Lattes com as devidas comprovações(as comprovações devem ser enviadas nos pŕoximos arquivos).</li>
                                    </ul>
                                </h6>
                                @if ($arquivos == null || $arquivos->curriculum_vitae_lattes == null)
                                    <div class="d-flex justify-content-left">
                                        <div>
                                            <a class="btn btn-primary">
                                                <div class="btn-group">
                                                    <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                    <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div style="margin-left:10px">
                                            <h6 style="color: red">Documento ainda <br>não foi enviado.</h6>
                                        </div>
                                    </div>
                                @else
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "lattes"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Formação acadêmica
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    <ul style="margin-left: -20px;">
                                        <li>Certificado/Diploma de Graduação e/ou Especialização e/ou Mestrado e/ou Doutorado conforme exigência para a vaga, emitido pela Instituição de Ensino Superior.</li>
                                    </ul>
                                </h6>
                                @if ($arquivos == null || $arquivos->formacao_academica == null)
                                    <div class="d-flex justify-content-left">
                                        <div>
                                            <a class="btn btn-primary">
                                                <div class="btn-group">
                                                    <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                    <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div style="margin-left:10px">
                                            <h6 style="color: red">Documento ainda <br>não foi enviado.</h6>
                                        </div>
                                    </div>
                                @else
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Formacao-academica"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top: 5px">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Experiência Didática
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    <ul style="margin-left: -20px;">
                                        <li>Tempo de exercício.</li>
                                        <li>Tempo de exercício como professor no Magistério Superior em Cursos a Distância.</li>
                                        <li>Participação em Bancas ou Comissões Examinadoras de Graduação e Pós-Graduação.</li>
                                        <li>Participação em Bancas ou Comissões Examinadoras de Seleção para o Magistério Superior.</li>
                                        <li>Orientação de Trabalhos Acadêmicos.</li>
                                        <li>Cursos ministrados (Extensão, Capacitação ou equivalentes na área da Seleção) / Para cada 10 horas</li>
                                    </ul>
                                </h6>
                                @if ($arquivos == null || $arquivos->experiencia_didatica == null)
                                    <div class="d-flex justify-content-left">
                                        <div>
                                            <a class="btn btn-primary">
                                                <div class="btn-group">
                                                    <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                    <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div style="margin-left:10px">
                                            <h6 style="color: red">Documento ainda <br>não foi enviado.</h6>
                                        </div>
                                    </div>
                                @else
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Experiencia-didatica"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top: 5px">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Produção Ciêntifica
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    <ul style="margin-left: -20px;">
                                        <li>Livros publicados.</li>
                                        <li>Capítulos de Livros publicados.</li>
                                        <li>Trabalhos publicados em Revistas e/ou periódicos de reconhecido valor científico ou cultural.</li>
                                        <li>Publicação de Livro Didático ou Material Didático na área da seleção com ISBN.</li>
                                        <li>Desenvolvimento de patentes com registro definitivo (carta patente).</li>
                                    </ul>
                                </h6>
                                @if ($arquivos == null || $arquivos->producao_cientifica == null)
                                    <div class="d-flex justify-content-left">
                                        <div>
                                            <a class="btn btn-primary">
                                                <div class="btn-group">
                                                    <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                    <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div style="margin-left:10px">
                                            <h6 style="color: red">Documento ainda <br>não foi enviado.</h6>
                                        </div>
                                    </div>
                                @else
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Producao-cientifica"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top: 5px">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Experiência Profissional
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    <ul style="margin-left: -20px;">
                                        <li>Exercício de cargo ou função de Administração Acadêmica.</li>
                                        <li>Prêmios e Láureas acadêmicas.</li>
                                        <li>Bolsas de Pesquisa financiadas por Órgãos de Fomento (exceto Bolsas de Formação)</li>
                                        <li>Exercício Profissional extrauniversitário, com vínculo empregatício, em área relacionada à matéria da seleção.</li>
                                        <li>Consultorias relacionadas ao setor de estudos da Seleção.</li>
                                        <li>Projetos de pesquisa aprovados por Órgãos de Fomento.</li>
                                    </ul>
                                </h6>
                                @if ($arquivos == null || $arquivos->experiencia_profissional == null)
                                    <div class="d-flex justify-content-left">
                                        <div>
                                            <a class="btn btn-primary">
                                                <div class="btn-group">
                                                    <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                    <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div style="margin-left:10px">
                                            <h6 style="color: red">Documento ainda <br>não foi enviado.</h6>
                                        </div>
                                    </div>
                                @else
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Experiencia-profissional"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @if(auth()->user()->role == "presidenteBancaExaminadora")
            <div class="col-md-6">
                <div class="card shadow bg-white style_card_container">
                    <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                        <h6 class="style_card_container_header_titulo">Pontuação</h6>
                    </div>
                    <div class="card-body">
                        <div>
                            @if ($avaliacao)
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>A pontuação já foi salva. </strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <a href="{{route('baixar.anexo', ['name'=> 'Ficha de avaliação.docx'])}}"  class="btn btn-success" 
                                        target="_blank" style="color:white;">Baixar Ficha de avaliação</a>
                                </div>
                            </div>
                            @if ($arquivos == null)
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong> Só é possível enviar a pontuação quando os arquivos estiverem disponíveis. </strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @else
                                @if ($avaliacao && Auth::user()->role == "chefeSetorConcursos")
                                    <form>
                                @else
                                    <form method="POST" action="{{ route('avalia.documentos.inscricao', $arquivos->inscricoes_id) }}" enctype="multipart/form-data">
                                @endif
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            @if (Auth::user()->role == "chefeSetorConcursos")
                                                <label for="ficha_avaliacao" class="form-label style_campo_titulo">Arquivo de pontuação</label>
                                            @endif
                                            @if($avaliacao != null && $avaliacao->ficha_avaliacao != null)
                                                <a class="btn btn-primary" href="{{route('visualizar.ficha-avaliacao', $avaliacao->id)}}" target="_new">
                                                    <div class="btn-group">
                                                        <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                        <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Arquivo de pontuação</h6>
                                                    </div>
                                                </a>
                                            @endif
                                            @if ($avaliacao == null && Auth::user()->role != "chefeSetorConcursos")
                                                <label for="ficha_avaliacao" class="form-label style_campo_titulo">Selecione o arquivo de pontuação</label>
                                                <input type="file" accept=".pdf" class="form-control form-control-sm @error('ficha_avaliacao') is-invalid @enderror" 
                                                    id="ficha_avaliacao" style="margin-left:-10px;margin-bottom:1rem; border:0px solid #fff" name="ficha_avaliacao"  required/>
                                                @error('ficha_avaliacao')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="col-md-12 form-group">
                                                    <label for="nota" class="style_campo_titulo">Pontuação total</label>
                                                    <input type="number" step=any id="nota" name="nota" min="0" max="100"
                                                        class="form-control style_campo" placeholder="Digite a pontuação do candidato" 
                                                        @if ($avaliacao)
                                                            value="{{ $avaliacao->nota }}"/>
                                                        @else
                                                            value="{{ old('nota') }}"/>
                                                        @endif 
                                                </div>
                                            </div>
                                            @if (!$avaliacao && Auth::user()->role != "chefeSetorConcursos")
                                                <div class="form-row justify-content-center">
                                                    <div class="col-md-12"><hr></div>
                                                    <div class="col-md-6 form-group" style="margin-bottom: 2.5px;">
                                                        <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">Enviar</button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>  
        @endif
    </div>
</div>
<script>
    $("input").change(function(){
        if(this.files[0].size > 2097152){
            alert("O arquivo deve ter no máximo 2MB!");
            this.value = "";
        };
    });
</script>
@endsection