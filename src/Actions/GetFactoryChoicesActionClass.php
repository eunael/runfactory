<?php
namespace Eunael\RunFactory\Actions;

class GetFactoryChoicesActionClass
{
    public function __construct(
        protected string $factoriesDir = '',
        protected array $choices = []
    ) {
        $this->factoriesDir = database_path('factories');
    }

    public static function choices(): array
    {
        return (new self)();
    }

    public function __invoke(): array
    {
        $this->factoriesChoices();

        return $this->choices;
    }

    protected function factoriesChoices($dir = ''): void
    {
        $factoriesDir = ($dir ?: $this->factoriesDir) . '/';

        $contentDir = array_diff(scandir($factoriesDir), ['.', '..']);

        foreach ($contentDir as $content) {
            if(str_ends_with((string) $content, '.php')) {
                $class = explode('.', (string) $content)[0];

                preg_match(
                    '/(?<=namespace\s).*(?=;\s)/',
                    file_get_contents($factoriesDir . $content),
                    $matches
                );

                $namespace = head($matches);

                $this->choices[] = implode('\\', [$namespace, $class]);

                continue;
            }

            $this->factoriesChoices($factoriesDir . $content);
        }
    }
}
