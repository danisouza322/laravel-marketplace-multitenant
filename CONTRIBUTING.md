# Guia de Contribuição

Obrigado por considerar contribuir para o Marketplace Multi-Tenant! Este documento contém diretrizes para contribuir com o projeto.

## Processo de Contribuição

1. Faça um fork do repositório
2. Crie uma branch para sua feature ou correção: `git checkout -b feature/nome-da-feature` ou `git checkout -b fix/nome-do-fix`
3. Implemente suas mudanças
4. Adicione testes quando aplicável
5. Certifique-se que todos os testes passam: `php artisan test`
6. Faça commit das suas alterações seguindo as convenções de commit
7. Envie um pull request

## Padrões de Código

* Seguimos o [PSR-12](https://www.php-fig.org/psr/psr-12/) para formatação de código
* Use nomes descritivos para variáveis e funções
* Documente todas as funções e classes com DocBlocks
* Mantenha métodos e classes focados em uma única responsabilidade

## Convenções de Commit

Usamos o padrão de commits semânticos:

* `feat:` para novas funcionalidades
* `fix:` para correção de bugs
* `docs:` para alterações na documentação
* `style:` para alterações que não afetam o funcionamento (formatação, etc)
* `refactor:` para refatorações de código
* `test:` para adição ou alteração de testes
* `chore:` para alterações em tarefas de build, configurações, etc

## Pull Requests

* Mantenha o escopo do PR limitado a uma única funcionalidade ou correção
* Adicione descrições claras sobre o que foi alterado e por quê
* Referencie issues relacionadas quando aplicável
* Garanta que seu PR passe em todos os testes e verificações

## Relatando Bugs

Ao relatar bugs, inclua:

* Versão do PHP e Laravel que está utilizando
* Passos detalhados para reproduzir o problema
* Comportamento esperado vs. comportamento observado
* Screenshots ou logs quando relevantes

## Sugestões de Features

Sugestões de novas funcionalidades são bem-vindas! Ao sugerir:

* Descreva claramente a funcionalidade
* Explique como ela beneficiaria o projeto
* Considere se é algo que seria útil para a maioria dos usuários

## Dúvidas?

Se você tiver qualquer dúvida sobre como contribuir, abra uma issue com sua pergunta. 