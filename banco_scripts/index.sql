CREATE OR REPLACE FUNCTION TempoExecucao(select_query TEXT) RETURNS TABLE (planning_time TEXT, execution_time TEXT)
AS $$
DECLARE
  total TEXT;
BEGIN
  EXECUTE 'EXPLAIN (ANALYZE, FORMAT JSON) ' || select_query INTO total;
  RETURN QUERY SELECT (total::jsonb)->0->>'Planning Time', (total::jsonb)->0->>'Execution Time';
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION media(sqlQuery TEXT, qtdExecuções INTEGER) RETURNS TABLE(planning_time_avg NUMERIC, execution_time_avg NUMERIC)
AS $$
DECLARE
    totalPlanningTime NUMERIC := 0;
    totalExecutionTime NUMERIC := 0;
    planning_time_str TEXT;
    exec_time_str TEXT;
    planning_time NUMERIC;
    exec_time NUMERIC;
BEGIN
    FOR i IN 1..qtdExecuções LOOP
        SELECT * INTO planning_time_str, exec_time_str FROM TempoExecucao(sqlQuery);
        EXECUTE 'SELECT ' || regexp_replace(planning_time_str, '[^0-9\.]', '', 'g') INTO planning_time;
        EXECUTE 'SELECT ' || regexp_replace(exec_time_str, '[^0-9\.]', '', 'g') INTO exec_time;
        totalPlanningTime := totalPlanningTime + planning_time;
        totalExecutionTime := totalExecutionTime + exec_time;
    END LOOP;
        planning_time_avg := (totalPlanningTime/qtdExecuções);
        execution_time_avg := (totalExecutionTime/qtdExecuções);
    RETURN NEXT;
END;
$$ LANGUAGE plpgsql;


--indice funcionarios (coluna funcao)
CREATE INDEX idx_fun_funcao ON tb_funcionarios using btree (fun_funcao);

--indice pessoas (coluna cpf)
CREATE INDEX idx_pe_cpf ON tb_pessoas USING btree (pe_cpf);

set enable_seqscan = off
set enable_indexscan = on
set enable_bitmapscan= on
set enable_indexonlyscan = on

