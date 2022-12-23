.PHONY: run psql test fmt help
.DEFAULT_GOAL := help

run: ## phpコンテナに入る
	docker-compose run php /bin/sh

psql: ## psqlにログインする
	docker exec -it postgres psql

test: ## テストを実行する
	docker-compose run php ./vendor/bin/phpunit test/

fmt: ## コード整形
	./vendor/bin/php-cs-fixer fix ./src
	./vendor/bin/php-cs-fixer fix ./test

help: ## ヘルプを表示する
	@echo -e "\e[31m▁▂▃▄▅▆▇▇▇▇ \e[32m🐘PHP🐘 \e[31m▇▇▇▇▆▅▄▃▂▁"
	@grep -E '^[a-zA-Z_-_\/]+:.*?## .*$$' $(MAKEFILE_LIST) | \
		awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'
