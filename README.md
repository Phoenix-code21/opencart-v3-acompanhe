# opencart-v3-acompanhe
<h3>Cadastro de notícias e imagem compatível com Opencart V3.</h3>
<hr>
<a href="https://prnt.sc/eQccg1Obkhoa" target="_blank">Área de Cadastro</a><br>
<a href="https://prnt.sc/EtpkhXQbJ8cy" target="_blank">Gerenciamento</a><br>  
<hr>
<strong>Adicionando ao dashboard da opencart</strong><br>
<span>Através do código de exemplo abaixo você consegue adicionar as rotas ao dashboard do Opencart v3</span><br>
<span>
  
			$exemplo_menu = [];

			if ($this->user->hasPermission('access', 'exemplo/cadastrar-noticias')) {
				$exemplo_menu[] = [
					'name'	   => $this->language->get('text_exemplo'),
					'href'     => $this->url->link('exemplo/cadastrar-noticias', 'user_token=' . $this->session->data['user_token']),
					'children' => []
				];
			}
  
  
                        if ($exemplo_menu) {
                            $data['menus'][] = [
                              'id'       => 'menu-exemplo',
                              'icon'	   => 'fas fa-tag',
                              'name'	   => $this->language->get('text_exemplo'),
                              'href'     => '',
                              'children' => $exemplo
                            ];
                          }

</span><br>
<strong>
 Observação: Você deve dar permissão as rotas de notícias através do usuário admin do opencart v3.
</strong>
