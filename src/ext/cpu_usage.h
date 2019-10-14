/*
   +----------------------------------------------------------------------+
   | Elastic APM agent for PHP                                            |
   +----------------------------------------------------------------------+
   | Copyright (c) 2019 Elasticsearch B.V                                 |
   +----------------------------------------------------------------------+
   | Elasticsearch B.V licenses this file under the Apache 2.0 License.   |
   | See the LICENSE file in the project root for more information.       |
   +----------------------------------------------------------------------+
   | Authors: Enrico Zimuel <enrico.zimuel@elastic.co>                    |
   |          Philip Krauss <philip.krauss@elastic.co>                    |
   +----------------------------------------------------------------------+
 */
 
void read_cpu(unsigned long long *user, unsigned long long *user_low, unsigned long long *sys, unsigned long long *idle);
void read_cpu_process(int pid, unsigned long long *user, unsigned long long *user_low, unsigned long long *sys, unsigned long long *idle);

double get_cpu_usage(unsigned long long last_user, unsigned long long last_user_low, unsigned long long last_sys, unsigned long long last_idle);
double get_cpu_process_usage(int pid, unsigned long long last_user, unsigned long long last_user_low, unsigned long long last_sys, unsigned long long last_idle);
double make_cpu_percent(unsigned long long last_user, unsigned long long last_user_low, unsigned long long last_sys, unsigned long long last_idle, unsigned long long user, unsigned long long user_low, unsigned long long sys, unsigned long long idle);